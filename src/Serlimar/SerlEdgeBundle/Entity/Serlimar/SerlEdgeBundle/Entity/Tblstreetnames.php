<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblstreetnames
 *
 * @ORM\Table(name="tblstreetnames", indexes={@ORM\Index(name="StreetName", columns={"StreetName"}), @ORM\Index(name="StreetNameCode", columns={"StreetNameCode"}), @ORM\Index(name="StreetName1", columns={"StreetName1"}), @ORM\Index(name="StreetName2", columns={"StreetName2"}), @ORM\Index(name="StreetName3", columns={"StreetName3"}), @ORM\Index(name="StreetName4", columns={"StreetName4"})})
 * @ORM\Entity
 */
class Tblstreetnames
{
    /**
     * @var integer
     *
     * @ORM\Column(name="StreetNameID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $streetnameid;

    /**
     * @var string
     *
     * @ORM\Column(name="GUID", type="string", length=40, nullable=true)
     */
    private $guid;

    /**
     * @var string
     *
     * @ORM\Column(name="StreetNameShortName", type="string", length=3, nullable=true)
     */
    private $streetnameshortname;

    /**
     * @var integer
     *
     * @ORM\Column(name="StreetNameCode", type="integer", nullable=true)
     */
    private $streetnamecode;

    /**
     * @var string
     *
     * @ORM\Column(name="StreetName", type="string", length=50, nullable=true)
     */
    private $streetname;

    /**
     * @var string
     *
     * @ORM\Column(name="StreetName1", type="string", length=50, nullable=true)
     */
    private $streetname1;

    /**
     * @var string
     *
     * @ORM\Column(name="StreetName2", type="string", length=50, nullable=true)
     */
    private $streetname2;

    /**
     * @var string
     *
     * @ORM\Column(name="StreetName3", type="string", length=50, nullable=true)
     */
    private $streetname3;

    /**
     * @var string
     *
     * @ORM\Column(name="StreetName4", type="string", length=50, nullable=true)
     */
    private $streetname4;

    /**
     * @var string
     *
     * @ORM\Column(name="Region", type="string", length=50, nullable=true)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="Zone", type="string", length=50, nullable=true)
     */
    private $zone;

    /**
     * @var string
     *
     * @ORM\Column(name="StreetName_linkText", type="string", length=50, nullable=true)
     */
    private $streetnameLinktext;

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="InUser", type="string", length=20, nullable=true)
     */
    private $inuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InDate", type="datetime", nullable=true)
     */
    private $indate;

    /**
     * @var string
     *
     * @ORM\Column(name="District", type="string", length=50, nullable=true)
     */
    private $district;

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
    private $notactive = '0';


}

