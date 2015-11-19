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
            ->add('email','email')
            ->add('role_collection_id', 'choice', array(
                    'choices' => $this->getRoles(),
                    'placeholder' => 'Choose an option'
            ))
            ->add('location','choice', array(
                'choices'=>array(
                    'santa cruz' => "Santa Cruz",
                    'savaneta' => "Savaneta",
                    'noord' => "Noord",
                    'paradera' => "Paradera",
                    'san nicolaas' => "San Nicolaas"
                ),
                'placeholder' => 'Choose an option'
            ))
            ;
        
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