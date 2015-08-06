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




}

