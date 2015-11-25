<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblinvoicesgroup
 *
 * @ORM\Table(name="tblinvoicesgroup")
 * @ORM\Entity
 */
class Tblinvoicesgroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="InvoiceGoupID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $invoicegoupid;

    /**
     * @var integer
     *
     * @ORM\Column(name="CustomerID", type="integer", nullable=true)
     */
    private $customerid;

    /**
     * @var string
     *
     * @ORM\Column(name="InvoiceNumber", type="string", length=50, nullable=true)
     */
    private $invoicenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="InvoiceMonth", type="string", length=50, nullable=true)
     */
    private $invoicemonth;

    /**
     * @var integer
     *
     * @ORM\Column(name="InvoiceServiceID", type="integer", nullable=true)
     */
    private $invoiceserviceid;

    /**
     * @var string
     *
     * @ORM\Column(name="InvoiceServiceDescription", type="string", length=50, nullable=true)
     */
    private $invoiceservicedescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DueDate", type="datetime", nullable=true)
     */
    private $duedate;

    /**
     * @var float
     *
     * @ORM\Column(name="Amount", type="float", precision=10, scale=0, nullable=true)
     */
    private $amount;

    /**
     * @var float
     *
     * @ORM\Column(name="Costs", type="float", precision=10, scale=0, nullable=true)
     */
    private $costs;

    /**
     * @var float
     *
     * @ORM\Column(name="Tax", type="float", precision=10, scale=0, nullable=true)
     */
    private $tax;

    /**
     * @var float
     *
     * @ORM\Column(name="TotalAmount", type="float", precision=10, scale=0, nullable=true)
     */
    private $totalamount;

    /**
     * @var float
     *
     * @ORM\Column(name="Balance", type="float", precision=10, scale=0, nullable=true)
     */
    private $balance;

    /**
     * @var integer
     *
     * @ORM\Column(name="BatchID", type="integer", nullable=true)
     */
    private $batchid;

    /**
     * @var integer
     *
     * @ORM\Column(name="InvoiceStatusID", type="integer", nullable=true)
     */
    private $invoicestatusid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sys_CreatedDate", type="datetime", nullable=true)
     */
    private $sysCreateddate;

    /**
     * @var integer
     *
     * @ORM\Column(name="sys_Trimester", type="integer", nullable=true)
     */
    private $sysTrimester;

    /**
     * @var integer
     *
     * @ORM\Column(name="sys_TrimesterSub", type="integer", nullable=true)
     */
    private $sysTrimestersub;

    /**
     * @var integer
     *
     * @ORM\Column(name="sys_Year", type="integer", nullable=true)
     */
    private $sysYear;


}

