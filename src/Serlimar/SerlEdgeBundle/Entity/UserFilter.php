<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * PaymentFilter
 *
 */
class UserFilter
{
  
    private $username;
    
    private $location;
    
    public function getUsername() {
        return $this->username;
    }

    public function getLocation() {
        return $this->location;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setLocation($location) {
        $this->location = $location;
    }


}

