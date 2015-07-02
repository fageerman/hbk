<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblcontracts
 *
 * @ORM\Table(name="tblcontracts", indexes={@ORM\Index(name="Address", columns={"Address"}), @ORM\Index(name="AddressID", columns={"AddressID"}), @ORM\Index(name="CustomerID", columns={"CustomerID"})})
 * @ORM\Entity
 */
class Tblcontracts
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ContractID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $contractid;

    /**
     * @var integer
     *
     * @ORM\Column(name="CustomerID", type="integer", nullable=true)
     */
    private $customerid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ContractDate", type="datetime", nullable=true)
     */
    private $contractdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="Type", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="AddressID", type="integer", nullable=true)
     */
    private $addressid;

    /**
     * @var string
     *
     * @ORM\Column(name="Address", type="string", length=75, nullable=true)
     */
    private $address;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PrintedDateTime", type="datetime", nullable=true)
     */
    private $printeddatetime;

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var integer
     *
     * @ORM\Column(name="ItemsCount", type="integer", nullable=true)
     */
    private $itemscount;

    /**
     * @var string
     *
     * @ORM\Column(name="ItemsDisplay", type="text", nullable=true)
     */
    private $itemsdisplay;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inDate", type="datetime", nullable=true)
     */
    private $indate;

    /**
     * @var string
     *
     * @ORM\Column(name="inUser", type="string", length=50, nullable=true)
     */
    private $inuser;

    /**
     * @var integer
     *
     * @ORM\Column(name="inUserID", type="integer", nullable=true)
     */
    private $inuserid;

    /**
     * @var string
     *
     * @ORM\Column(name="LastChangeUser", type="string", length=50, nullable=true)
     */
    private $lastchangeuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CancelledDate", type="datetime", nullable=true)
     */
    private $cancelleddate;

    /**
     * @var string
     *
     * @ORM\Column(name="CancelledBy", type="string", length=50, nullable=true)
     */
    private $cancelledby;

    /**
     * @var string
     *
     * @ORM\Column(name="Memo", type="text", nullable=true)
     */
    private $memo;

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
    private $notactive = 'b\'0\'';


}

