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
    
    public function __construct(EntityManager $em = null)
    {
        $this->em = $em;
    }
    
    private function getPermissions($entity)
    {
        $query = $this->em->createQuery('select r.id, r.entity, r.operation from SerlimarSerlEdgeBundle:Tblroles r '
                . 'where r.entity = :entity')->setParameter('entity', $entity);
        $query->execute();
        $results = $query->getResult();
        $choices = array();
        foreach($results as $result){
            $choices[$result['id']] = ucfirst($result['operation']);
        }
        
        return $choices;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('role','text');
      
            $builder
            ->add('payment','choice', array(
               'choices' => $this->getPermissions('payment'),
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('user','choice', array(
               'choices' => $this->getPermissions('user'),
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('roleCollection','choice', array(
               'choices' => $this->getPermissions('role'),
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('customer','choice', array(
               'choices' => $this->getPermissions('customer'),
                'multiple' => true,
                'expanded' => true,
            ));
            
    }

    public function getName()
    {
        return 'roleCollection';
    }
}