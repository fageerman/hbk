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

class RoleCollectionType extends AbstractType
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
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
            ->add('role','text');
            //->add('roles', 'roleCollectionRoles');
            
    }

    public function getName()
    {
        return 'roleCollection';
    }
}