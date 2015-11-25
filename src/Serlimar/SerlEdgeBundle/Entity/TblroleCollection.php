<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TblroleCollection
 *
 * @ORM\Table(name="tblrole_collection")
 * @ORM\Entity
 */
class TblroleCollection
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
       @Assert\NotNull(
     *      message="Enter a name for the role."
     * )
     * @ORM\Column(name="role", type="string", length=45, nullable=false)
     */
    private $role;
    
    //This is not best practice. A good solution for now.
    private $payment;
    
    private $roleCollection;
    
    private $customer;
    
    private $user;
    
    
    function getId() {
        return $this->id;
    }

    function getRole() {
        return $this->role;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRole($role) {
        $this->role = $role;
    }

    function getPayment() {
        return $this->payment;
    }

    function getRoleCollection() {
        return $this->roleCollection;
    }

    function getCustomer() {
        return $this->customer;
    }

    function getUser() {
        return $this->user;
    }

    function setPayment($payment) {
        $this->payment = $payment;
    }

    function setRoleCollection($roleCollection) {
        $this->roleCollection = $roleCollection;
    }

    function setCustomer($customer) {
        $this->customer = $customer;
    }

    function setUser($user) {
        $this->user = $user;
    }




}
