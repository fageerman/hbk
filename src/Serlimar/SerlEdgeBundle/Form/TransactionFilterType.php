<?php

/**
 * Description of TransactionType
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


class TransactionFilterType extends AbstractType
{

    protected $roleUser;
    
    public function __construct($roleUser)
    {
        $this->roleUser = $roleUser;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('startDate','date',array(
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => array(
                       'placeholder' => 'dd-mm-yyyy',
                       'class'=> 'datepicker'
                    ),
                'label' => 'Start transactiondate'
                ))
               ->add('endDate','datetime',array(
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => array(
                        'class' => 'date',
                        'required' => false,
                        'placeholder' => 'dd-mm-yyyy',
                        'class'=> 'datepicker'
                        
                    ),
                  'label' => 'End transactiondate'
                ))
                ->add('insertedBy', 'text', array('attr' =>array(
                    'label'=>'Inserted By'
                )));
                
            //->add('Filter', 'submit', array('attr'=>array('class'=>'btn  btn-primary', 'novalidate'=> true)))
        if($this->roleUser == 'Superadmin'){
            $builder->add('location', 'choice', array(
                'choices'  => array(
                    'santa cruz' => 'Santa Cruz',
                    'savaneta' => 'Savaneta',
                    'san nicolas' => 'San Nicolas',
                    'paradera' => 'Paradera',
                    'noord' => 'Noord',
                ),
                'placeholder' => 'Choose a location',
            ));
        }
    }

    public function getName()
    {
        return 'transaction_filter';
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerlEdgeBundle\Entity\TransactionFilter',
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

                 
                if ($startDate == null && $endDate !== null) {
                    return array('only-startdate');
                    
                }
                 
                return array('Default');
            },
        ));
    }
}