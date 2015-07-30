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
use Serlimar\SerlEdgeBundle\Form\PaymentType;
use Doctrine\ORM\EntityManager;
use Serlimar\SerlEdgeBundle\DataTransformer\CustomerNrToGuidTransformer;

class UpdatePaymentType extends PaymentType
{
    
    /*
     * Construct the PaymentForm with an EntityManager if necesary.  
     * The customerguid field catches a 
     * 
     */
    public function __construct(EntityManager $em = null)
    {
        parent::__construct($em);
       
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->remove('save');
    }

    public function getName()
    {
        return 'updatepayment';
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerlEdgeBundle\Entity\Tblpayments',
        ));
    }
}