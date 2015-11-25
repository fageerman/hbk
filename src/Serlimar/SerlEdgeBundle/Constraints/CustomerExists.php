<?php
/**
 * Description of CustomerExistsValidator
 *
 * @author Ferdinand Geerman
 */
namespace Serlimar\SerlEdgeBundle\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CustomerExists extends Constraint
{
    public $message = 'The customer id "%string%" does not exist.';
    
    public function validatedBy()
    {
        return 'validator_customer_exists';
    }
}
