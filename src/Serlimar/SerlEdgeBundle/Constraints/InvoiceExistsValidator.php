<?php
/**
 * Description of CustomerExistsValidator
 *
 * @author Ferdinand Geerman
 */
namespace Serlimar\SerlEdgeBundle\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManager;

class InvoiceExistsValidator extends ConstraintValidator{
    
    private $repo;
    
    public function __construct(EntityManager $em)
    {
        $this->repo = $em->getRepository('Serlimar\SerlEdgeBundle\Entity\Tblinvoices');
    }
    
    public function validate($value, Constraint $constraint)
    { 
        
        if(!is_numeric($value) || $value == 0)
        {
            $this->context->buildViolation($constraint->message)
                    ->setParameter('%string%', $value)
                    ->addViolation();
        }else{
            $customer = $this->repo->findBy(array('invoicenumber'=> $value));
            if(empty($customer))
            {
               $this->context->buildViolation($constraint->message)
                    ->setParameter('%string%', $value)
                    ->addViolation();
            }
        }
    }
}
