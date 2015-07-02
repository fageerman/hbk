<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblformssecurity
 *
 * @ORM\Table(name="tblformssecurity", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})}, indexes={@ORM\Index(name="$Form", columns={"Formsname"}), @ORM\Index(name="$Control", columns={"Controlename"}), @ORM\Index(name="$Username", columns={"Username"}), @ORM\Index(name="$Role", columns={"Role"})})
 * @ORM\Entity
 */
class Tblformssecurity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="GUID", type="string", length=40, nullable=true)
     */
    private $guid;

    /**
     * @var string
     *
     * @ORM\Column(name="Formsname", type="string", length=100, nullable=true)
     */
    private $formsname;

    /**
     * @var string
     *
     * @ORM\Column(name="Controlename", type="string", length=100, nullable=true)
     */
    private $controlename;

    /**
     * @var string
     *
     * @ORM\Column(name="Action", type="string", length=255, nullable=true)
     */
    private $action;

    /**
     * @var string
     *
     * @ORM\Column(name="Username", type="string", length=100, nullable=true)
     */
    private $username;

    /**
     * @var integer
     *
     * @ORM\Column(name="Role", type="integer", nullable=true)
     */
    private $role;


}

