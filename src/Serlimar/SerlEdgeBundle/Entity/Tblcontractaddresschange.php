<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblcontractaddresschange
 *
 * @ORM\Table(name="tblcontractaddresschange", indexes={@ORM\Index(name="$ContractID", columns={"ContractID"})})
 * @ORM\Entity
 */
class Tblcontractaddresschange
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
     * @var integer
     *
     * @ORM\Column(name="ContractID", type="integer", nullable=true)
     */
    private $contractid;

    /**
     * @var integer
     *
     * @ORM\Column(name="AddressWas", type="integer", nullable=true)
     */
    private $addresswas;

    /**
     * @var integer
     *
     * @ORM\Column(name="AddressTo", type="integer", nullable=true)
     */
    private $addressto;

    /**
     * @var string
     *
     * @ORM\Column(name="InsertUser", type="string", length=150, nullable=true)
     */
    private $insertuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TimeStamp", type="datetime", nullable=true)
     */
    private $timestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UserActionDate", type="datetime", nullable=true)
     */
    private $useractiondate;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=150, nullable=true)
     */
    private $username;


}

