<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbllookups
 *
 * @ORM\Table(name="tbllookups", indexes={@ORM\Index(name="Lookup", columns={"Lookup"})})
 * @ORM\Entity
 */
class Tbllookups
{
    /**
     * @var integer
     *
     * @ORM\Column(name="LookupID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $lookupid;

    /**
     * @var string
     *
     * @ORM\Column(name="GUID", type="string", length=40, nullable=true)
     */
    private $guid;

    /**
     * @var string
     *
     * @ORM\Column(name="Lookup", type="string", length=50, nullable=true)
     */
    private $lookup;

    /**
     * @var string
     *
     * @ORM\Column(name="DescriptionCode", type="string", length=50, nullable=true)
     */
    private $descriptioncode;

    /**
     * @var integer
     *
     * @ORM\Column(name="SortOrder", type="integer", nullable=true)
     */
    private $sortorder;

    /**
     * @var string
     *
     * @ORM\Column(name="FormsCombo", type="string", length=120, nullable=true)
     */
    private $formscombo;

    /**
     * @var string
     *
     * @ORM\Column(name="FormsName", type="string", length=120, nullable=true)
     */
    private $formsname;

    /**
     * @var float
     *
     * @ORM\Column(name="NormalRangeLow", type="float", precision=10, scale=0, nullable=true)
     */
    private $normalrangelow;

    /**
     * @var float
     *
     * @ORM\Column(name="NormalValue", type="float", precision=10, scale=0, nullable=true)
     */
    private $normalvalue;

    /**
     * @var float
     *
     * @ORM\Column(name="NormalRangeUp", type="float", precision=10, scale=0, nullable=true)
     */
    private $normalrangeup;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Related", type="boolean", nullable=true)
     */
    private $related = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="RelationshipID", type="integer", nullable=true)
     */
    private $relationshipid;

    /**
     * @var float
     *
     * @ORM\Column(name="IntPrice", type="float", precision=10, scale=0, nullable=true)
     */
    private $intprice;

    /**
     * @var float
     *
     * @ORM\Column(name="Tax", type="float", precision=10, scale=0, nullable=true)
     */
    private $tax;

    /**
     * @var float
     *
     * @ORM\Column(name="OtherPriceCalc", type="float", precision=10, scale=0, nullable=true)
     */
    private $otherpricecalc;

    /**
     * @var float
     *
     * @ORM\Column(name="TotalPrice", type="float", precision=10, scale=0, nullable=true)
     */
    private $totalprice;

    /**
     * @var integer
     *
     * @ORM\Column(name="Color", type="integer", nullable=true)
     */
    private $color;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Default", type="boolean", nullable=true)
     */
    private $default = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inDate", type="datetime", nullable=true)
     */
    private $indate;

    /**
     * @var string
     *
     * @ORM\Column(name="Memo", type="text", nullable=true)
     */
    private $memo;

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
     * @var boolean
     *
     * @ORM\Column(name="NotActive", type="boolean", nullable=true)
     */
    private $notactive = '0';


}

