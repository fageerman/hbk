<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * PaymentFilter
 *
 */
class PaymentFilter
{
    
    /**
     *
     * @var DateTime
     * @Assert\NotNull(
     *      message="Enter a valid date."
     * )
     * @Assert\DateTime(
     *      groups={"only-startdate"}
     * )
     */
    private $startDate;
    
    
     /**
     *
     * @var DateTime
     * 
     * @Assert\NotNull(
      *     message="Enter a valid date."
      * )
     * @Assert\DateTime(
     * )
     * 
     */
    private $endDate;
    
    public function getStartDate() {
        return $this->startDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    /**
     * 
     * @Assert\Callback
     */
    public function validate(ExecutionContextInterface $context)
    {
       //Endate is entered without the start date
      
       if($this->getStartDate() > $this->getEndDate())
       {
            $context->buildViolation('The enddate can not occur before the startdate.')
                ->atPath('endDate')
                ->addViolation();
       }
       
       if(($this->getStartDate() !== null && $this->getEndDate() !== null) && $this->getStartDate() == $this->getEndDate())
       {
            $context->buildViolation('The enddate can not be the same as the startdate.')
                ->atPath('endDate')
                ->addViolation();
       }
       
    }
}

