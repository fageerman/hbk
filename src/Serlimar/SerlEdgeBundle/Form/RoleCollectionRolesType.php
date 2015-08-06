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
use Doctrine\ORM\EntityManager;

class RoleCollectionRolesType extends AbstractType
{
    
    private function getPermissions()
    {
        return array( 
                'list'=>'List',
                'create'=>'Create',
                'read'=>'Read',
                'update'=>'Update',
                'delete'=>'Delete'
            );
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('payment','choice', array(
               'choices' => $this->getPermissions(),
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('user','choice', array(
               'choices' => $this->getPermissions(),
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('role','choice', array(
               'choices' => $this->getPermissions(),
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('customer','choice', array(
               'choices' => array(
                   'list'=> 'List'
                ),
                'multiple' => true,
                'expanded' => true,
            ));
    }
    
    public function getName()
    {
        return 'roleCollectionRoles';
    }
}