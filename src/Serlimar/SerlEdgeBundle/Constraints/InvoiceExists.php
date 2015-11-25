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
class InvoiceExists extends Constraint
{
    public $message = 'The invoice nr "%string%" does not exist.';
    
    public function validatedBy()
    {
        return 'validator_invoice_exists';
    }
}
