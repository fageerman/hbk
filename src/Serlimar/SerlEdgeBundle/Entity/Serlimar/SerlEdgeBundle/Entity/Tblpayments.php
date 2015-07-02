<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblpayments
 *
 * @ORM\Table(name="tblpayments", indexes={@ORM\Index(name="$PaymentDate", columns={"PaymentDate"}), @ORM\Index(name="$CustomerGUID", columns={"CustomerGUID"}), @ORM\Index(name="$LoactionGUID", columns={"LocationGUID"}), @ORM\Index(name="$InsertUser", columns={"InsertUser"}), @ORM\Index(name="$PaymentID", columns={"PaymentsID"})})
 * @ORM\Entity
 */
class Tblpayments
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
     * @var float
     *
     * @ORM\Column(name="PaymentsID", type="float", precision=10, scale=0, nullable=true)
     */
    private $paymentsid;

    /**
     * @var string
     *
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
     *
     * @ORM\Column(name="Amount", type="float", precision=10, scale=0, nullable=true)
     */
    private $amount = '0';

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
     *
     * @ORM\Column(name="PaymentMethod", type="string", length=40, nullable=true)
     */
    private $paymentmethod;

    /**
     * @var integer
     *
     * @ORM\Column(name="InvoiceNr", type="integer", nullable=true)
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
    private $confirmed = 'b\'0\'';

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="LocationGUID", type="string", length=40, nullable=true)
     */
    private $locationguid;

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
     * @var string
     *
     * @ORM\Column(name="LoactionGUID", type="string", length=40, nullable=true)
     */
    private $loactionguid;

    /**
     * @var boolean
     *
     * @ORM\Column(name="NotActive", type="boolean", nullable=true)
     */
    private $notactive = 'b\'0\'';


}

