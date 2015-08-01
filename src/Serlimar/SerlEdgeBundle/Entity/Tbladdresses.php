<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbladdresses
 *
 * @ORM\Table(name="tbladdresses", indexes={@ORM\Index(name="$Address", columns={"Address"}), @ORM\Index(name="$StreetName", columns={"StreetName"}), @ORM\Index(name="$StreetNameID", columns={"StreetNameID"}), @ORM\Index(name="$ShortName", columns={"AddressShortName"}), @ORM\Index(name="$Clasification", columns={"Clasification"}), @ORM\Index(name="$AddressNr", columns={"AdressNR"}), @ORM\Index(name="$AddressLetter", columns={"AddressLetter"})})
 * @ORM\Entity
 */
class Tbladdresses
{
    /**
     * @var string
     *
     * @ORM\Column(name="GUID", type="string", length=40)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $guid;

    /**
     * @var integer
     *
     * @ORM\Column(name="AddressID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $addressid;

    /**
     * @var string
     *
     * @ORM\Column(name="Address", type="string", length=75, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="AddressShortName", type="string", length=25, nullable=true)
     */
    private $addressshortname;

    /**
     * @var integer
     *
     * @ORM\Column(name="StreetNameID", type="integer", nullable=true)
     */
    private $streetnameid;

    /**
     * @var string
     *
     * @ORM\Column(name="StreetName", type="string", length=75, nullable=true)
     */
    private $streetname;

    /**
     * @var string
     *
     * @ORM\Column(name="GACName", type="string", length=10, nullable=true)
     */
    private $gacname;

    /**
     * @var string
     *
     * @ORM\Column(name="Lot", type="string", length=2, nullable=true)
     */
    private $lot;

    /**
     * @var integer
     *
     * @ORM\Column(name="AdressNR", type="integer", nullable=true)
     */
    private $adressnr;

    /**
     * @var string
     *
     * @ORM\Column(name="AddressLetter", type="string", length=3, nullable=true)
     */
    private $addressletter;

    /**
     * @var string
     *
     * @ORM\Column(name="Apt", type="string", length=2, nullable=true)
     */
    private $apt;

    /**
     * @var string
     *
     * @ORM\Column(name="Info_CBS", type="string", length=255, nullable=true)
     */
    private $infoCbs;

    /**
     * @var string
     *
     * @ORM\Column(name="Info_Serlimar", type="string", length=255, nullable=true)
     */
    private $infoSerlimar;

    /**
     * @var string
     *
     * @ORM\Column(name="Clasification", type="string", length=5, nullable=true)
     */
    private $clasification;

    /**
     * @var float
     *
     * @ORM\Column(name="Periode", type="float", precision=10, scale=0, nullable=true)
     */
    private $periode;

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
     * @var float
     *
     * @ORM\Column(name="Lat_WGS84", type="float", precision=10, scale=0, nullable=true)
     */
    private $latWgs84;

    /**
     * @var float
     *
     * @ORM\Column(name="Lon_WGS84", type="float", precision=10, scale=0, nullable=true)
     */
    private $lonWgs84;

    /**
     * @var string
     *
     * @ORM\Column(name="Address Letter Voor", type="string", length=255, nullable=true)
     */
    private $addressLetterVoor;

    /**
     * @var string
     *
     * @ORM\Column(name="Volledige Adress", type="string", length=255, nullable=true)
     */
    private $volledigeAdress;

    /**
     * @var integer
     *
     * @ORM\Column(name="ServicedBy", type="integer", nullable=true)
     */
    private $servicedby;

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsCommercial", type="boolean", nullable=true)
     */
    private $iscommercial = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsDomestic", type="boolean", nullable=true)
     */
    private $isdomestic = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsOrganization", type="boolean", nullable=true)
     */
    private $isorganization = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsNotAvailable", type="boolean", nullable=true)
     */
    private $isnotavailable = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Route", type="string", length=5, nullable=true)
     */
    private $route;

    /**
     * @var string
     *
     * @ORM\Column(name="RouteInternal", type="string", length=7, nullable=true)
     */
    private $routeinternal;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsNotCompleted", type="boolean", nullable=true)
     */
    private $isnotcompleted;

    /**
     * @var string
     *
     * @ORM\Column(name="Source", type="string", length=25, nullable=true)
     */
    private $source;

    /**
     * @var string
     *
     * @ORM\Column(name="PickupDay", type="string", length=15, nullable=true)
     */
    private $pickupday;

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
    private $notactive = 'b\'0\'';


}

