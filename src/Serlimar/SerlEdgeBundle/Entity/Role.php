<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Payment
 *
 * @ORM\Table()
 */
class Role
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
    private $role;
    
    /**
     * @ManyToMany(targetEntity="Permission", inversedBy="roles")
     * @JoinTable(name="permissions_roles")
     **/
    private $permissions;

    public function __construct() {
        $this->permissions = new ArrayCollection();
    }

}

