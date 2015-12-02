<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * TransactionFilter
 *
 */
class TransactionFilter
{
    
    /**
     *
     * @var DateTime
     * @Assert\NotBlank(
     *      message="Please fill in a start date.",
     *      groups={"only-startdate"}
     * )
     * @Assert\DateTime(
     * )
     */
    private $startDate;
    
    
     /**
     *
     * @var DateTime
     * 
     * @Assert\DateTime(
     * )
     * 
     */
    private $endDate;
    
    /**
     * 
     * 
     */
    private $insertedBy;
    
    private $location;
    
    
    public function getStartDate() {
        return $this->startDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }
    
    function getInsertedBy() {
        return $this->insertedBy;
    }
    
    function getLocation() {
        return $this->location;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    function setInsertedBy($insertedBy) {
        $this->insertedBy = $insertedBy;
    }
    
    function setLocation($location) {
        $this->location = $location;
    }

    
    /**
     * 
     * @Assert\Callback
     */
    public function validate(ExecutionContextInterface $context)
    {
       //Enddate is entered without the start date
      
       if($this->getEndDate() !== null && $this->getStartDate() > $this->getEndDate())
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

