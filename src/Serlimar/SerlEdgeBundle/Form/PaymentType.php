<?php

/**
 * Description of PaymentType
 *
 * @author Ferdinand Geerman
 */
namespace Serlimar\SerlEdgeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormInterface;
use Doctrine\ORM\EntityManager;
use Serlimar\SerlEdgeBundle\DataTransformer\CustomerNrToGuidTransformer;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;


class PaymentType extends AbstractType
{
    private $em;
    private $customerid;
    
    
    /*
     * Construct the PaymentForm with an EntityManager if necesary.  
     * The customerguid field catches a 
     * 
     */
    public function __construct(EntityManager $em = null, $customerid = null)
    {
        $this->em = $em;
        $this->customerid = $customerid;
       
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // If customerID is defined, means that the customercontroller 
        // has send an customerID for creationg a payment.
        if($this->customerid != null){
             $builder
            ->add('customerguid','integer', array(
                'label'=>'Customer Id',
                'attr'=>array(
                    'placeholder' => 'Scan barcode'
                    ),
                 'data' => $this->customerid
                ));
        }else{
             $builder
            ->add('customerguid','integer', array(
                'label'=>'Customer Id',
                'attr'=>array(
                    'placeholder' => 'Scan barcode'
                    ),
                ));
        }

            $builder->add('reference','integer', array(
                'label'=>'Invoice Nr', 
                'attr'=>array('type'=>'integer', 
                'placeholder' => 'Scan barcode',
                )))
            ->add('paymentmethod', 'choice', array(
                    'label' => 'Payment method',
                    'placeholder' => 'Choose a method',
                    'choices' => array(
                        '1231bcfd-b485-11e4-a684-32ea009ce708'=>'SWIPE',
                        '0a7c5956-b485-11e4-a684-32ea009ce708'=>'CASH',
                        ),
                      //  $this->getPaymentMethods()
               
            ))
            ->add('amount','money', array('precision' => 2,'currency'=>'AWG'))
            ->add('note','textarea', array('required'=>false))
            ->add('save', 'submit', array('attr'=>array('class'=>'btn  btn-primary', 'novalidate'=> true)))
        ;
       
       // $builder->get('customerguid')
       //     ->addModelTransformer(new CustomerNrToGuidTransformer($this->em));
        

    }

    public function getName()
    {
        return 'payment';
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerlEdgeBundle\Entity\Tblpayments',
        ));
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => function (FormInterface $form) {
                $data = $form->getData();
                $invoiceNr = $data->getReference();
                if ($invoiceNr !== null) {
                    //Check if the provided invoicenr is a valid one.
                    $invoiceResult = $this->em->createQuery('SELECT i.invoicenumber FROM '
                    . 'SerlimarSerlEdgeBundle:Tblinvoices i WHERE i.invoicenumber = :invoicenumber '
                    . 'and i.invoicenumber != 0')->setParameter('invoicenumber',$invoiceNr)->getResult();

                    $invoiceNumber = (empty($invoiceResult))? null: $invoiceNr;
                    $data->setReference($invoiceNumber);

                    return array('Default', 'invoice');
                }

                return array('Default');
            },
        ));
    }
    
    private function getPaymentMethods()
    {
        $query = $this->em->createQuery("SELECT tbllookups.guid, tbllookups.lookup
            FROM SerlimarSerlEdgeBundle:Tbllookups tbllookups INNER JOIN SerlimarSerlEdgeBundle:Tblpaymentmethodsallowed p WITH tbllookups.guid = p.paymentmethodguid INNER JOIN SerlimarSerlEdgeBundle:Tbluseraccesslevel u WITH p.roleid = u.accesslevelid
            WHERE tbllookups.formscombo ='cmbPaymentsMethod' AND tbllookups.notactive = False AND u.accesslevel='HBK' 
            ORDER BY tbllookups.sortorder, tbllookups.lookup");
        $result = $query->getResult();
        
        return $result;
    }

}