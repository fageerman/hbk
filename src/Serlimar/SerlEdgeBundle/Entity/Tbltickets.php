<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbltickets
 *
 * @ORM\Table(name="tbltickets", indexes={@ORM\Index(name="$TicketDate", columns={"TicketDate"}), @ORM\Index(name="$Vehicle", columns={"VehicleID", "VehicleGUID"}), @ORM\Index(name="$Company", columns={"CompanyID", "CompanyGUID"}), @ORM\Index(name="$Material", columns={"MaterialID", "MaterialGUID"}), @ORM\Index(name="$Container", columns={"ContainerID", "ContainerGUID"}), @ORM\Index(name="$Source", columns={"SourceID", "SourceGUID"})})
 * @ORM\Entity
 */
class Tbltickets
{
    /**
     * @var string
     *
     * @ORM\Column(name="GUID", type="string", length=40)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $guid = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="TicketID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ticketid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TicketDate", type="datetime", nullable=true)
     */
    private $ticketdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TimeIN", type="time", nullable=true)
     */
    private $timein;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TimeOut", type="time", nullable=true)
     */
    private $timeout;

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
     * @var string
     *
     * @ORM\Column(name="VehicleID", type="string", length=10, nullable=true)
     */
    private $vehicleid;

    /**
     * @var string
     *
     * @ORM\Column(name="VehicleGUID", type="string", length=40, nullable=true)
     */
    private $vehicleguid;

    /**
     * @var string
     *
     * @ORM\Column(name="Operator", type="string", length=3, nullable=true)
     */
    private $operator;

    /**
     * @var integer
     *
     * @ORM\Column(name="OperatorID", type="integer", nullable=true)
     */
    private $operatorid;

    /**
     * @var string
     *
     * @ORM\Column(name="OperatorGUID", type="string", length=40, nullable=true)
     */
    private $operatorguid;

    /**
     * @var integer
     *
     * @ORM\Column(name="MaterialID", type="integer", nullable=true)
     */
    private $materialid;

    /**
     * @var string
     *
     * @ORM\Column(name="MaterialGUID", type="string", length=40, nullable=true)
     */
    private $materialguid;

    /**
     * @var integer
     *
     * @ORM\Column(name="JobID", type="integer", nullable=true)
     */
    private $jobid;

    /**
     * @var integer
     *
     * @ORM\Column(name="ContainerID", type="integer", nullable=true)
     */
    private $containerid;

    /**
     * @var string
     *
     * @ORM\Column(name="ContainerGUID", type="string", length=40, nullable=true)
     */
    private $containerguid;

    /**
     * @var float
     *
     * @ORM\Column(name="ContainerWeight", type="float", precision=10, scale=0, nullable=true)
     */
    private $containerweight;

    /**
     * @var string
     *
     * @ORM\Column(name="ManualContainer", type="string", length=1, nullable=true)
     */
    private $manualcontainer;

    /**
     * @var float
     *
     * @ORM\Column(name="GrossWeight", type="float", precision=10, scale=0, nullable=true)
     */
    private $grossweight;

    /**
     * @var float
     *
     * @ORM\Column(name="TareWeight", type="float", precision=10, scale=0, nullable=true)
     */
    private $tareweight;

    /**
     * @var float
     *
     * @ORM\Column(name="VehicleWeight", type="float", precision=10, scale=0, nullable=true)
     */
    private $vehicleweight;

    /**
     * @var float
     *
     * @ORM\Column(name="NetWeight", type="float", precision=10, scale=0, nullable=true)
     */
    private $netweight;

    /**
     * @var float
     *
     * @ORM\Column(name="UnitPrice", type="float", precision=10, scale=0, nullable=true)
     */
    private $unitprice;

    /**
     * @var float
     *
     * @ORM\Column(name="NetPrice", type="float", precision=10, scale=0, nullable=true)
     */
    private $netprice;

    /**
     * @var float
     *
     * @ORM\Column(name="LocalSalesTax", type="float", precision=10, scale=0, nullable=true)
     */
    private $localsalestax;

    /**
     * @var float
     *
     * @ORM\Column(name="TotalPrice", type="float", precision=10, scale=0, nullable=true)
     */
    private $totalprice;

    /**
     * @var integer
     *
     * @ORM\Column(name="InvoiceID", type="integer", nullable=true)
     */
    private $invoiceid;

    /**
     * @var string
     *
     * @ORM\Column(name="InvoiceGIUD", type="string", length=40, nullable=true)
     */
    private $invoicegiud;

    /**
     * @var integer
     *
     * @ORM\Column(name="InvoiceNr", type="integer", nullable=true)
     */
    private $invoicenr;

    /**
     * @var string
     *
     * @ORM\Column(name="NoWeigh", type="string", length=1, nullable=true)
     */
    private $noweigh;

    /**
     * @var string
     *
     * @ORM\Column(name="ManualEntry", type="string", length=1, nullable=true)
     */
    private $manualentry;

    /**
     * @var string
     *
     * @ORM\Column(name="Inspection", type="string", length=1, nullable=true)
     */
    private $inspection;

    /**
     * @var string
     *
     * @ORM\Column(name="Inbound", type="string", length=1, nullable=true)
     */
    private $inbound;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=1, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="Charge-Cash", type="string", length=1, nullable=true)
     */
    private $chargeCash;

    /**
     * @var string
     *
     * @ORM\Column(name="FixedCharge", type="string", length=1, nullable=true)
     */
    private $fixedcharge;

    /**
     * @var float
     *
     * @ORM\Column(name="Units", type="float", precision=10, scale=0, nullable=true)
     */
    private $units;

    /**
     * @var string
     *
     * @ORM\Column(name="UnitName", type="string", length=10, nullable=true)
     */
    private $unitname;

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="Location", type="string", length=45, nullable=true)
     */
    private $location;

    /**
     * @var integer
     *
     * @ORM\Column(name="SourceID", type="integer", nullable=true)
     */
    private $sourceid;

    /**
     * @var string
     *
     * @ORM\Column(name="SourceGUID", type="string", length=40, nullable=true)
     */
    private $sourceguid;

    /**
     * @var string
     *
     * @ORM\Column(name="Category", type="string", length=45, nullable=true)
     */
    private $category;

    /**
     * @var float
     *
     * @ORM\Column(name="Haulcharge", type="float", precision=10, scale=0, nullable=true)
     */
    private $haulcharge;

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
     * @ORM\Column(name="reprint", type="boolean", nullable=true)
     */
    private $reprint = 'b\'0\'';

    /**
     * @var string
     *
     * @ORM\Column(name="InsertUser", type="string", length=150, nullable=true)
     */
    private $insertuser;


}

