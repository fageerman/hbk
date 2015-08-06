<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Payment
 *
 * @ORM\Table()
 */
class Permission
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     * @ORM\Column(type="string", length="45")
     */
    private $permission;
    
    /**
     * @var string
     *
     * @ORM\Column(type="string", length="45")
     */
    private $entity;
    
    /**
     * @var string
     *
     * @ORM\Column(type="string", length="45")
     */
    private $operation;
    
    
    /**
     * @var string
     *
     * @ORM\Column(type="string", length="45")
     */
    private $uri;
    
     /**
     * @ManyToMany(targetEntity="Role", mappedBy="permissions")
     **/
    private $roles;

    public function __construct() {
        $this->roles = new ArrayCollection();
    }
}

