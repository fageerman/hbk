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
use Doctrine\ORM\EntityManager;
use Serlimar\SerlEdgeBundle\DataTransformer\CustomerNrToGuidTransformer;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;


class PaymentType extends AbstractType
{
    private $em;
    
    
    /*
     * Construct the PaymentForm with an EntityManager if necesary.  
     * The customerguid field catches a 
     * 
     */
    public function __construct(EntityManager $em = null)
    {
        $this->em = $em;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('customerguid','integer', array('label'=>'Customer Id','attr'=>array('placeholder' => 'Scan barcode')))
            ->add('invoicenr','integer', array('label'=>'Invoice Nr', 'attr'=>array('type'=>'integer', 'placeholder' => 'Scan barcode')))
            ->add('paymentmethod', 'choice', array(
                    'label' => 'Payment method',
                    'placeholder' => 'Choose a method',
                    'choices' => array(
                        '1231bcfd-b485-11e4-a684-32ea009ce708'=>'SWIPE',
                        '0a7c5956-b485-11e4-a684-32ea009ce708'=>'CASH',
                ),
            ))
            ->add('amount','money', array('precision' => 2,'currency'=>'AWG'))
            ->add('note','textarea', array('required'=>false))
            ->add('save', 'submit', array('attr'=>array('class'=>'btn  btn-primary', 'novalidate'=> true)))
        ;

        $builder->get('customerguid')
            ->addModelTransformer(new CustomerNrToGuidTransformer($this->em));
        
        //Check if the provided invoice number is a valid invoice number.
        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
            $data = $event->getData();
            $form = $event->getForm();
            $invoiceNr = $data['invoicenr'];
                       
            $invoiceResult = $this->em->createQuery('SELECT i.invoicenumber FROM SerlimarSerlEdgeBundle:Tblinvoices i WHERE i.invoicenumber = :invoicenumber and i.invoicenumber != 0')
            ->setParameter('invoicenumber',$invoiceNr)->getResult();
            
            $invoiceNumber = (empty($invoiceResult))? "": $invoiceNr;
            $data['invoicenr']=$invoiceNumber;
            $event->setData($data);
        });
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
}