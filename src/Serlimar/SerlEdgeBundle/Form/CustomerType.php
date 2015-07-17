<?php

/**
 * Description of CustomerType
 *
 * @author Ferdinand Geerman
 */
namespace Serlimar\SerlEdgeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('birthdate','date',array(
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => array('placeholder' => 'dd-mm-yyyy')
             ))
            ->add('search', 'submit', array('attr'=>array('class'=>'btn  btn-primary')));
    }

    public function getName()
    {
        return 'customer';
    }
    
}