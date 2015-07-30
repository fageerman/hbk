<?php

/**
 * Description of UserType
 *
 * @author Ferdinand Geerman
 */
namespace Serlimar\SerlEdgeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username','text')
            ->add('firstname','text')
            ->add('lastname', 'text')
            ->add('shortname','text')
            ->add('password','repeated', array(
                'type' => 'password',
                'invalid_message' => 'The password fields must match',
                'options' => array('attr' => array('class' => 'password-field')),
                'first_options' => array('label'=>'Password'),
                'second_options' => array('label'=>'Repeat Password'),
                
            ));
    }

    public function getName()
    {
        return 'user';
    }
    
}