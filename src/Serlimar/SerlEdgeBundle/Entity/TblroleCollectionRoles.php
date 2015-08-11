<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblroleCollectionRoles
 *
 * @ORM\Table(name="tblrole_collection_roles")
 * @ORM\Entity
 */
class TblroleCollectionRoles
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
     * @var integer
     *
     * @ORM\Column(name="role_collection_id", type="integer", nullable=true)
     */
    private $roleCollectionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="role_id", type="integer", nullable=true)
     */
    private $roleId;
    
    public function getRoleCollectionId() {
        return $this->roleCollectionId;
    }

    public function getRoleId() {
        return $this->roleId;
    }

    public function setRoleCollectionId($roleCollectionId) {
        $this->roleCollectionId = $roleCollectionId;
    }

    public function setRoleId($roleId) {
        $this->roleId = $roleId;
    }



}

