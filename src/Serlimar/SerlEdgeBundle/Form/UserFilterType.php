<?php

/**
 * Description of PaymentType
 *
 * @author Ferdinand Geerman
 */
namespace Serlimar\SerlEdgeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormInterface;

class UserFilterType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
            ->add('username','text')
           // ->add('firstname','text')
            ->add('location','text')
               ;
//            ->add('role_collection_id', 'choice', array(
//                    'choices' => $this->getRoles(),
//                    'placeholder' => 'Choose an option'
//            ));
    }

    public function getName()
    {
        return 'userfilter';
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerlEdgeBundle\Entity\UserFilter',
        ));
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
//        $resolver->setDefaults(array(
//            'validation_groups' => function (FormInterface $form) {
//                $data = $form->getData();
//
//                $startDate = $data->getStartDate();
//                $endDate = $data->getEndDate();
//
//                 
//                if ($startDate !== null && $endDate === null) {
//                    return array('only-startdate');
//                }
//                 
//                return array('Default');
//            },
//        ));
    }
}