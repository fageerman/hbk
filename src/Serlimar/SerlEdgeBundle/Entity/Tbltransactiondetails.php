<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbltransactiondetails
 *
 * @ORM\Table(name="tbltransactiondetails", indexes={@ORM\Index(name="$TransactionGUID", columns={"TransactionGUID"}), @ORM\Index(name="$Type", columns={"Type"})})
 * @ORM\Entity
 */
class Tbltransactiondetails
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
     * @var string
     *
     * @ORM\Column(name="TransactionGUID", type="string", length=40, nullable=true)
     */
    private $transactionguid;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=15, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="OrderID", type="integer", nullable=true)
     */
    private $orderid;

    /**
     * @var string
     *
     * @ORM\Column(name="ItemGUID", type="string", length=40, nullable=true)
     */
    private $itemguid;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=150, nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="Costs", type="float", precision=10, scale=0, nullable=true)
     */
    private $costs;

    /**
     * @var float
     *
     * @ORM\Column(name="Qty", type="float", precision=10, scale=0, nullable=true)
     */
    private $qty;

    /**
     * @var float
     *
     * @ORM\Column(name="Rate", type="float", precision=10, scale=0, nullable=true)
     */
    private $rate;

    /**
     * @var float
     *
     * @ORM\Column(name="Procent", type="float", precision=10, scale=0, nullable=true)
     */
    private $procent;

    /**
     * @var float
     *
     * @ORM\Column(name="Total", type="float", precision=10, scale=0, nullable=true)
     */
    private $total;

    /**
     * @var float
     *
     * @ORM\Column(name="Tax", type="float", precision=10, scale=0, nullable=true)
     */
    private $tax;

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
     * @var string
     *
     * @ORM\Column(name="UserAction", type="string", length=50, nullable=true)
     */
    private $useraction;

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

