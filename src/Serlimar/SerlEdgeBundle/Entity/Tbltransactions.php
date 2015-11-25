<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbltransactions
 *
 * @ORM\Table(name="tbltransactions", indexes={@ORM\Index(name="$Customer", columns={"CustomerGUID"}), @ORM\Index(name="$Type", columns={"Type"}), @ORM\Index(name="$transactiondate", columns={"TransactionDate"})})
 * @ORM\Entity
 */
class Tbltransactions
{
    /**
     * @var string
     *
     * @ORM\Column(name="GUID", type="string", length=40)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $guid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionDate", type="date", nullable=true)
     */
    private $transactiondate;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=15, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="TransactionNumber", type="integer", nullable=true)
     */
    private $transactionnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="Reference", type="string", length=50, nullable=true)
     */
    private $reference;

    /**
     * @var integer
     *
     * @ORM\Column(name="CustomerID", type="integer", nullable=false)
     */
    private $customerid;

    /**
     * @var string
     *
     * @ORM\Column(name="CustomerGUID", type="string", length=40, nullable=true)
     */
    private $customerguid;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="TermsGUID", type="string", length=40, nullable=true)
     */
    private $termsguid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DueDate", type="date", nullable=true)
     */
    private $duedate;

    /**
     * @var integer
     *
     * @ORM\Column(name="Period", type="integer", nullable=true)
     */
    private $period;

    /**
     * @var string
     *
     * @ORM\Column(name="Contract", type="string", length=100, nullable=true)
     */
    private $contract;

    /**
     * @var string
     *
     * @ORM\Column(name="PaymentMethodGUID", type="string", length=40, nullable=true)
     */
    private $paymentmethodguid;

    /**
     * @var string
     *
     * @ORM\Column(name="Currency", type="string", length=50, nullable=true)
     */
    private $currency;

    /**
     * @var float
     *
     * @ORM\Column(name="Subtotal", type="float", precision=10, scale=0, nullable=true)
     */
    private $subtotal;

    /**
     * @var float
     *
     * @ORM\Column(name="Costs", type="float", precision=10, scale=0, nullable=true)
     */
    private $costs;

    /**
     * @var float
     *
     * @ORM\Column(name="Transactionsubtotal", type="float", precision=10, scale=0, nullable=true)
     */
    private $transactionsubtotal;

    /**
     * @var string
     *
     * @ORM\Column(name="TaxDescription", type="string", length=45, nullable=true)
     */
    private $taxdescription;

    /**
     * @var float
     *
     * @ORM\Column(name="Tax", type="float", precision=10, scale=0, nullable=true)
     */
    private $tax;

    /**
     * @var float
     *
     * @ORM\Column(name="Total", type="float", precision=10, scale=0, nullable=true)
     */
    private $total;

    /**
     * @var float
     *
     * @ORM\Column(name="Transactiontotal", type="float", precision=10, scale=0, nullable=true)
     */
    private $transactiontotal;

    /**
     * @var float
     *
     * @ORM\Column(name="Received", type="float", precision=10, scale=0, nullable=true)
     */
    private $received;

    /**
     * @var float
     *
     * @ORM\Column(name="Balance", type="float", precision=10, scale=0, nullable=true)
     */
    private $balance;

    /**
     * @var float
     *
     * @ORM\Column(name="AccountBalance", type="float", precision=10, scale=0, nullable=true)
     */
    private $accountbalance;

    /**
     * @var string
     *
     * @ORM\Column(name="StatusGUID", type="string", length=40, nullable=true)
     */
    private $statusguid;

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isSend", type="boolean", nullable=true)
     */
    private $issend = 'b\'0\'';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sendDate", type="datetime", nullable=true)
     */
    private $senddate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isPrinted", type="boolean", nullable=true)
     */
    private $isprinted = 'b\'0\'';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Printed", type="datetime", nullable=true)
     */
    private $printed;

    /**
     * @var integer
     *
     * @ORM\Column(name="PrintCount", type="integer", nullable=true)
     */
    private $printcount = '0';

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

