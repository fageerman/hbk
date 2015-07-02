<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblminicontainer
 *
 * @ORM\Table(name="tblminicontainer", indexes={@ORM\Index(name="ContractID", columns={"ContractID"}), @ORM\Index(name="CustomerID", columns={"CustomerID"}), @ORM\Index(name="Minicontainer", columns={"Minicontainer"})})
 * @ORM\Entity
 */
class Tblminicontainer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="MinicointainerID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $minicointainerid;

    /**
     * @var integer
     *
     * @ORM\Column(name="CustomerID", type="integer", nullable=true)
     */
    private $customerid;

    /**
     * @var integer
     *
     * @ORM\Column(name="ContractID", type="integer", nullable=true)
     */
    private $contractid;

    /**
     * @var string
     *
     * @ORM\Column(name="Minicontainer", type="string", length=10, nullable=true)
     */
    private $minicontainer;

    /**
     * @var integer
     *
     * @ORM\Column(name="BillTo", type="integer", nullable=true)
     */
    private $billto;

    /**
     * @var string
     *
     * @ORM\Column(name="sys_UserIntake", type="string", length=50, nullable=true)
     */
    private $sysUserintake;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sys_InDate", type="datetime", nullable=true)
     */
    private $sysIndate;

    /**
     * @var string
     *
     * @ORM\Column(name="sys_InUser", type="string", length=50, nullable=true)
     */
    private $sysInuser;

    /**
     * @var string
     *
     * @ORM\Column(name="Memo", type="text", nullable=true)
     */
    private $memo;

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

    /**
     * @var string
     *
     * @ORM\Column(name="Locked", type="string", length=50, nullable=true)
     */
    private $locked;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LockedDate", type="datetime", nullable=true)
     */
    private $lockeddate;

    /**
     * @var string
     *
     * @ORM\Column(name="LockedUserID", type="string", length=50, nullable=true)
     */
    private $lockeduserid;

    /**
     * @var string
     *
     * @ORM\Column(name="LockedUserName", type="string", length=150, nullable=true)
     */
    private $lockedusername;

    /**
     * @var boolean
     *
     * @ORM\Column(name="NotActive", type="boolean", nullable=true)
     */
    private $notactive = '0';


}

