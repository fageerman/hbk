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

class CustomerExistsValidator extends ConstraintValidator{
    
    private $repo;
    
    public function __construct(EntityManager $em)
    {
        $this->repo = $em->getRepository('Serlimar\SerlEdgeBundle\Entity\Tblcustomers');
    }
    
    public function validate($value, Constraint $constraint)
    { 
        
        if(is_numeric($value))
        {
            $customer = $this->repo->findBy(array('customerid'=> $value));
            if(empty($customer))
            {
                $this->context->buildViolation($constraint->message)
                    ->setParameter('%string%', $value)
                    ->addViolation();
            }
        
        }
    }
}
