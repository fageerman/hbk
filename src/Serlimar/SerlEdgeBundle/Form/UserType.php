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
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormInterface;

class UserType extends AbstractType
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username','text')
            ->add('firstname','text')
            ->add('lastname', 'text')
            ->add('shortname','text')
            ->add('role_collection_id', 'choice', array(
                    'choices' => $this->getRoles(),
                    'placeholder' => 'Choose an option'
            ))
            ->add('plainPassword','repeated', array(
                'type' => 'password',
                'invalid_message' => 'The password fields must match',
                'options' => array('attr' => array('class' => 'password-field')),
                'first_options' => array('label'=>'Password'),
                'second_options' => array('label'=>'Confirm Password'),
                
            ));
        
    }
    
    private function getRoles()
    {
        $repo = $this->em->getRepository('SerlimarSerlEdgeBundle:TblroleCollection')->findAll();
        $roles = array();
        foreach($repo as $r)
        {
            $roles[$r->getId()] = $r->getRole();
        }
        return $roles;
    }


    public function getName()
    {
        return 'user';
    }
}