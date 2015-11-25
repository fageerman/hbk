<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblcomplaints
 *
 * @ORM\Table(name="tblcomplaints")
 * @ORM\Entity
 */
class Tblcomplaints
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
     * @var integer
     *
     * @ORM\Column(name="ComplaintID", type="integer", nullable=true)
     */
    private $complaintid;

    /**
     * @var integer
     *
     * @ORM\Column(name="ComplaintTypeID", type="integer", nullable=true)
     */
    private $complainttypeid;

    /**
     * @var string
     *
     * @ORM\Column(name="Complaint", type="text", nullable=true)
     */
    private $complaint;

    /**
     * @var string
     *
     * @ORM\Column(name="CallbackPhone", type="string", length=15, nullable=true)
     */
    private $callbackphone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FollowUpDate", type="datetime", nullable=true)
     */
    private $followupdate;

    /**
     * @var string
     *
     * @ORM\Column(name="FollowUpNote", type="text", nullable=true)
     */
    private $followupnote;

    /**
     * @var integer
     *
     * @ORM\Column(name="FollowUpType", type="integer", nullable=true)
     */
    private $followuptype;

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var integer
     *
     * @ORM\Column(name="StatusID", type="integer", nullable=true)
     */
    private $statusid;

    /**
     * @var string
     *
     * @ORM\Column(name="StatusGUID", type="string", length=40, nullable=true)
     */
    private $statusguid;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Completed", type="boolean", nullable=true)
     */
    private $completed = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="AddressID", type="integer", nullable=true)
     */
    private $addressid;

    /**
     * @var string
     *
     * @ORM\Column(name="AddressGUID", type="string", length=40, nullable=true)
     */
    private $addressguid;

    /**
     * @var string
     *
     * @ORM\Column(name="Address", type="string", length=75, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="AddressShort", type="string", length=25, nullable=true)
     */
    private $addressshort;

    /**
     * @var string
     *
     * @ORM\Column(name="Route", type="string", length=7, nullable=true)
     */
    private $route;

    /**
     * @var string
     *
     * @ORM\Column(name="LastChangeUser", type="string", length=50, nullable=true)
     */
    private $lastchangeuser;

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

