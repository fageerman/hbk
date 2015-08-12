<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/*
 * Tblpayments
 * @ORM\Table(name="tblpayments", indexes={@ORM\Index(name="$PaymentDate", columns={"PaymentDate"}), @ORM\Index(name="$CustomerGUID", columns={"CustomerGUID"}), @ORM\Index(name="$LocationGUID", columns={"LocationGUID"}), @ORM\Index(name="$InsertUser", columns={"InsertUser"}), @ORM\Index(name="$PaymentID", columns={"PaymentsID"})})
 * @ORM\Entity
 */
class Tblpayments
{
    /**
    * @var string
    * @ORM\Column(name="GUID", type="string")
    */
    private $guid;

    /**
     * @var float
     *
     * @ORM\Column(name="PaymentsID", type="float", precision=10, scale=0, nullable=true)
     */
    private $paymentsid;

    /**
     * @var string
     * @Assert\NotBlank(
     *      message="Enter a valid customer nr."
     *      )
     * @ORM\Column(name="CustomerGUID", type="string", length=45, nullable=true)
     */
    private $customerguid;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PaymentDate", type="datetime", nullable=true)
     */
    private $paymentdate;

    /**
     * @var float
     * @Assert\NotNull(
     *     message="Enter a valid amount."
     * )
     * @Assert\Regex(
     *     pattern="/^\d+(\.([0-9]){1,2})?$/",
     *     message="Enter a valid amount.."
     * )
     * @ORM\Column(name="Amount", type="float", precision=2, scale=0, nullable=true)
     */
    private $amount;

    /**
     * @var float
     *
     * @ORM\Column(name="Applied", type="float", precision=10, scale=0, nullable=true)
     */
    private $applied = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="Credit", type="float", precision=10, scale=0, nullable=true)
     */
    private $credit = '0';

    /**
     * @var string
     * @Assert\NotBlank(
     *  message="Choose a payment method."
     * )
     * @ORM\Column(name="PaymentMethod", type="string", length=40, nullable=true)
     */
    private $paymentmethod;

    /**
     * @var integer
     * @Assert\NotNull(
     *     message="Enter a valid invoice nr.",
     *     groups={"invoice"},
     *      )
     * @Assert\Length(
     *   min= 1,
     *   max= 11,
     *      minMessage="Enter a valid invoice nr.",
     *      maxMessage="Enter a valid invoice nr.",
     *      groups={"invoice"},
     * )    
     * @ORM\Column(name="InvoiceNr", type="integer")
     */
    private $invoicenr;

    /**
     * @var integer
     *
     * @ORM\Column(name="AuthNr", type="integer", nullable=true)
     */
    private $authnr;

    /**
     * @var string
     *
     * @ORM\Column(name="Reference", type="string", length=150, nullable=true)
     */
    private $reference;

    /**
     * @var integer
     *
     * @ORM\Column(name="GL", type="integer", nullable=true)
     */
    private $gl;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Confirmed", type="boolean", nullable=true)
     */
    private $confirmed = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="LoactionGUID", type="string", length=40, nullable=true)
     */
    private $loactionguid;

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
    private $timestamp;

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
     * @var string
     *
     * @ORM\Column(name="LocationGUID", type="string", length=40, nullable=true)
     */
    private $locationguid;

    /**
     * @var boolean
     *
     * @ORM\Column(name="NotActive", type="boolean", nullable=true)
     */
    private $notactive = 0;


    
    
    public function getGuid()
    {
        return $this->guid;
    }
    
    
    public function getPaymentDate()
    {
        return $this->paymentdate;
    }
    
    public function getPaymentMethod()
    {
        return $this->paymentmethod;
    }
    
    public function getPaymentId()
    {
        return $this->paymentsid;
    }
    
    public function getAmount()
    {
        return $this->amount;
    }
    
    public function getCustomerGuid()
    {
        return $this->customerguid;
    }
    
    public function getInsertUser()
    {
        return $this->insertuser;
    }
    
    public function getInvoicenr()
    {
        return $this->invoicenr;
    }
    
    public function getNote()
    {
        return $this->note;
    }
    
    public function setPaymentDate($paymentdate)
    {
        $this->paymentdate = $paymentdate;
    }
    
    public function setPaymentMethod($paymentmethod)
    {
        $this->paymentmethod = $paymentmethod;
    }
    
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
    
    public function setCustomerGuid($customerguid)
    {
        $this->customerguid = $customerguid;
    }
    
    public function setInsertUser($insertuser)
    {
        $this->insertuser = $insertuser;
    }
    
    public function setInvoicenr($invoicenr)
    {
        $this->invoicenr = $invoicenr;
    }
    
    public function setNote($note)
    {
        $this->note = $note;
    }
    
    public function setDate($date)
    {
        $this->date = $date;
    }
    
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }
    
    public function setGuid($guid)
    {
        $this->guid = $guid;
    }
    
    public function setPaymentsId($paymentsid)
    {
        $this->paymentsid = $paymentsid;
    }
    
    public function setUserActionDate($actionDate)
    {
        $this->useractiondate = $actionDate;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }
}

