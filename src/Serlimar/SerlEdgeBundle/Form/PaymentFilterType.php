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
use Doctrine\ORM\EntityManager;
use Serlimar\SerlEdgeBundle\DataTransformer\CustomerNrToGuidTransformer;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;


class PaymentFilterType extends AbstractType
{

    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('startDate','datetime',array(
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => array(
                        'class' => 'date',
                        'placeholder' => 'dd-mm-yyyy',
                        
                    ),
                'label' => 'Start paymentdate'
                ))
               ->add('endDate','datetime',array(
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => array(
                        'class' => 'date',
                        'required' => false,
                        'placeholder' => 'dd-mm-yyyy',
                        
                    ),
                  'label' => 'End paymentdate'
                ))
            //->add('Filter', 'submit', array('attr'=>array('class'=>'btn  btn-primary', 'novalidate'=> true)))
        ;

    }

    public function getName()
    {
        return 'payment';
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerlEdgeBundle\Entity\PaymentFilter',
        ));
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => function (FormInterface $form) {
                $data = $form->getData();
               // var_dump($data);die;
                
                
                $startDate = $data->getStartDate();
                $endDate = $data->getEndDate();

                 
                if ($startDate !== null && $endDate === null) {
                    return array('only-startdate');
                }
                 
                return array('Default');
            },
        ));
    }
}