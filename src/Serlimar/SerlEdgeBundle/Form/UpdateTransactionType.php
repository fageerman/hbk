<?php

/**
 * Description of UpdateTransactionType
 *
 * @author Ferdinand Geerman
 */
namespace Serlimar\SerlEdgeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Serlimar\SerlEdgeBundle\Form\TransactionType;
use Doctrine\ORM\EntityManager;
use Serlimar\SerlEdgeBundle\DataTransformer\CustomerNrToGuidTransformer;

class UpdateTransactionType extends TransactionType
{
    
    /*
     * Construct the TransactionForm with an EntityManager if necesary.  
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
        return 'update_transaction';
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerlEdgeBundle\Entity\Tbltransactionsqueue',
        ));
    }
}