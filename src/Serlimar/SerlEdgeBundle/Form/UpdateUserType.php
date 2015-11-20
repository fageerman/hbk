<?php

/**
 * Description of UserType
 *
 * @author Ferdinand Geerman
 */
namespace Serlimar\SerlEdgeBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Doctrine\ORM\EntityManager;

class UpdateUserType extends UserType
{
    
    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
    }

     public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('plainPassword','repeated', array(
                'type' => 'password',
                'invalid_message' => 'The password fields must match',
                'options' => array('attr' => array('class' => 'password-field')),
                'first_options' => array('label'=>'Password'),
                'second_options' => array('label'=>'Confirm Password'),
            ))
            //->add('submit','submit')
            ;
        
    }
    
    public function getName()
    {
        return 'updateuser';
    }

    public function configureOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Serlimar\SerlEdgeBundle\Entity\Tblusers',
        ));
    }
    
     public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => function(FormInterface $form){
                $data = $form->getData();
               
                    return array('Default','reset-password');
            }
        ));
    }
    
    
}