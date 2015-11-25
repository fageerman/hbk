<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblcontractitems
 *
 * @ORM\Table(name="tblcontractitems", indexes={@ORM\Index(name="ItemNo", columns={"ItemNo"})})
 * @ORM\Entity
 */
class Tblcontractitems
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ContractItemsID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $contractitemsid;

    /**
     * @var integer
     *
     * @ORM\Column(name="ContractID", type="integer", nullable=true)
     */
    private $contractid;

    /**
     * @var integer
     *
     * @ORM\Column(name="LineNumber", type="integer", nullable=true)
     */
    private $linenumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="ItemType", type="integer", nullable=true)
     */
    private $itemtype;

    /**
     * @var integer
     *
     * @ORM\Column(name="ItemStatus", type="integer", nullable=true)
     */
    private $itemstatus;

    /**
     * @var string
     *
     * @ORM\Column(name="ItemNo", type="string", length=10, nullable=true)
     */
    private $itemno;

    /**
     * @var integer
     *
     * @ORM\Column(name="BillTo", type="integer", nullable=true)
     */
    private $billto;

    /**
     * @var float
     *
     * @ORM\Column(name="Lat_nonEarth", type="float", precision=10, scale=0, nullable=true)
     */
    private $latNonearth;

    /**
     * @var float
     *
     * @ORM\Column(name="Lon_nonEarth", type="float", precision=10, scale=0, nullable=true)
     */
    private $lonNonearth;

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InDate", type="datetime", nullable=true)
     */
    private $indate;

    /**
     * @var string
     *
     * @ORM\Column(name="InUser", type="string", length=50, nullable=true)
     */
    private $inuser;

    /**
     * @var integer
     *
     * @ORM\Column(name="InUserID", type="integer", nullable=true)
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
     * @ORM\Column(name="LastChangeDate", type="datetime", nullable=true)
     */
    private $lastchangedate;

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

