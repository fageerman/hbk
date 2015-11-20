<?php

namespace Serlimar\SerlEdgeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Description of ResetPasswordType
 *
 * @author Ferdinand Geerman
 */
class ResetPasswordType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
       
        $builder
                ->add('plainPassword', 'repeated', array(
                    'type'=>'password',
                    'invalid_message' => 'The password fields must match.',
                    'options' => array('attr' => array('class' => 'password-field')),
                    'required' => true,
                    'first_options'  => array('attr' =>array('placeholder' => 'Password'),'label'=>false),
                    'second_options' => array('attr' => array('placeholder' => 'Repeat Password'),'label'=>false),
                ))
                ->add('token','hidden',array('mapped' => false))
                ->add('submit', 'submit', array('label'=>'Reset Password'));
    }
    
    public function getName()
    {
        return 'reset_password';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => function(FormInterface $form){
                $data = $form->getData();
               
                    return array('reset-password');
            }
        ));
    }
}

