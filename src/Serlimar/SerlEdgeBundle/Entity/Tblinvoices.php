<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraint as Assert;

/**
 * Tblinvoices
 *
 * @ORM\Table(name="tblinvoices", indexes={@ORM\Index(name="InvoiceNumber", columns={"InvoiceNumber"}), @ORM\Index(name="$CustomerGUID", columns={"CustomerGUID"}), @ORM\Index(name="$Date", columns={"InvoiceDate"}), @ORM\Index(name="$DueDate", columns={"DueDate"}), @ORM\Index(name="$PaymentMethod", columns={"PaymentMethod"}), @ORM\Index(name="$Printed", columns={"Printed"}), @ORM\Index(name="$Period", columns={"Period"}), @ORM\Index(name="$ContractID", columns={"ContractID"})})
 * @ORM\Entity
 */
class Tblinvoices
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
     * @ORM\Column(name="CustomerID", type="integer", nullable=true)
     */
    private $customerid;

    /**
     * @var string
     *
     * @ORM\Column(name="CustomerGUID", type="string", length=40, nullable=true)
     */
    private $customerguid;

    /**
     * @var integer
     *
     * @ORM\Column(name="CompanyID", type="integer", nullable=true)
     */
    private $companyid;

    /**
     * @var string
     *
     * @ORM\Column(name="CompanyGUID", type="string", length=40, nullable=true)
     */
    private $companyguid;

    /**
     * @var integer
     * @ORM\Column(name="InvoiceNumber", type="integer", nullable=true)
     */
    private $invoicenumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InvoiceDate", type="date", nullable=true)
     */
    private $invoicedate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="InvoiceClosed", type="boolean", nullable=true)
     */
    private $invoiceclosed = 'b\'0\'';

    /**
     * @var boolean
     *
     * @ORM\Column(name="SendInvoice", type="boolean", nullable=true)
     */
    private $sendinvoice = 'b\'0\'';

    /**
     * @var boolean
     *
     * @ORM\Column(name="PrintedInvoice", type="boolean", nullable=true)
     */
    private $printedinvoice = 'b\'0\'';

    /**
     * @var integer
     *
     * @ORM\Column(name="Terms", type="integer", nullable=true)
     */
    private $terms;

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
     * @var integer
     *
     * @ORM\Column(name="Period", type="integer", nullable=true)
     */
    private $period;

    /**
     * @var string
     *
     * @ORM\Column(name="PaymentMethod", type="string", length=50, nullable=true)
     */
    private $paymentmethod;

    /**
     * @var string
     *
     * @ORM\Column(name="Currency", type="string", length=50, nullable=true)
     */
    private $currency;

    /**
     * @var float
     *
     * @ORM\Column(name="InvoiceTotal", type="float", precision=10, scale=0, nullable=true)
     */
    private $invoicetotal;

    /**
     * @var float
     *
     * @ORM\Column(name="Costs", type="float", precision=10, scale=0, nullable=true)
     */
    private $costs;

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
     * @ORM\Column(name="Balance", type="float", precision=10, scale=0, nullable=true)
     */
    private $balance;

    /**
     * @var integer
     *
     * @ORM\Column(name="InvoiceStatus", type="integer", nullable=true)
     */
    private $invoicestatus;

    /**
     * @var string
     *
     * @ORM\Column(name="Reference", type="string", length=50, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="Reference2", type="string", length=50, nullable=true)
     */
    private $reference2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sys_CreatedDate", type="datetime", nullable=true)
     */
    private $sysCreateddate;

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

    /**
     * @var integer
     *
     * @ORM\Column(name="ContractID", type="integer", nullable=true)
     */
    private $contractid;

    /**
     * @var float
     *
     * @ORM\Column(name="SubTotal", type="float", precision=10, scale=0, nullable=true)
     */
    private $subtotal;

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


}

