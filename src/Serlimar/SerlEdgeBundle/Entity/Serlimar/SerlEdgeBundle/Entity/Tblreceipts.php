<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblreceipts
 *
 * @ORM\Table(name="tblreceipts")
 * @ORM\Entity
 */
class Tblreceipts
{
    /**
     * @var string
     *
     * @ORM\Column(name="GUID", type="string", length=40)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $guid = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="ReceiptNumber", type="integer", nullable=true)
     */
    private $receiptnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="CustomerGUID", type="string", length=40, nullable=true)
     */
    private $customerguid;

    /**
     * @var string
     *
     * @ORM\Column(name="CompanyGUID", type="string", length=40, nullable=true)
     */
    private $companyguid;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="PaymentMethod", type="string", length=40, nullable=true)
     */
    private $paymentmethod;

    /**
     * @var string
     *
     * @ORM\Column(name="Reference", type="string", length=50, nullable=true)
     */
    private $reference;

    /**
     * @var float
     *
     * @ORM\Column(name="SubTotal", type="float", precision=10, scale=0, nullable=true)
     */
    private $subtotal;

    /**
     * @var float
     *
     * @ORM\Column(name="BBO", type="float", precision=10, scale=0, nullable=true)
     */
    private $bbo;

    /**
     * @var float
     *
     * @ORM\Column(name="BAZV", type="float", precision=10, scale=0, nullable=true)
     */
    private $bazv;

    /**
     * @var float
     *
     * @ORM\Column(name="Total", type="float", precision=10, scale=0, nullable=true)
     */
    private $total;

    /**
     * @var float
     *
     * @ORM\Column(name="Costs", type="float", precision=10, scale=0, nullable=true)
     */
    private $costs;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sys_CreatedDate", type="datetime", nullable=true)
     */
    private $sysCreateddate;

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="text", nullable=true)
     */
    private $note;

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
     * @ORM\Column(name="UserID", type="string", length=50, nullable=true)
     */
    private $userid;

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
     * @var float
     *
     * @ORM\Column(name="Version", type="float", precision=10, scale=0, nullable=true)
     */
    private $version;


}

