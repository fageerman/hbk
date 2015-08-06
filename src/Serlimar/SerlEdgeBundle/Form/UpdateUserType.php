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
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class UpdateUserType extends AbstractType
{
    private $logger;
    private $passwordreset;
    
    public function __construct($logger, $passwordreset = false)
    {
        $this->logger = $logger;
        $this->passwordreset = $passwordreset;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
         $builder
            ->add('username','text')
            ->add('firstname','text')
            ->add('lastname', 'text')
            ->add('shortname','text')
            ->add('role_collection_id', 'entity', array(
                    'class' => 'SerlimarSerlEdgeBundle:TblroleCollection',
                    'property' => 'id',
                    'placeholder' => 'Choose an option'
            ));
         
         if($this->passwordreset){
            $builder->add('password','repeated', array(
                'type' => 'password',
                'invalid_message' => 'The password fields must match',
                'options' => array('attr' => array('class' => 'password-field')),
                'first_options' => array('label'=>'New Password'),
                'second_options' => array('label'=>'Repeat New Password'),
                
            ));
        }
    }
    

    
    public function getName()
    {
        return 'updateuser';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Serlimar\SerlEdgeBundle\Entity\Tblusers',
        ));
    }
    
    
}