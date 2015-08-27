<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Customer
 *
 * @ORM\Table(name="tblcustomers", indexes={@ORM\Index(name="$Address", columns={"Address"}), @ORM\Index(name="$CustomerNo", columns={"CustomerNo"}), @ORM\Index(name="$FirstName", columns={"FirstName"}), @ORM\Index(name="$Name", columns={"Name"}), @ORM\Index(name="$StatusID", columns={"StatusID"}), @ORM\Index(name="$DOB", columns={"BirthDate"}), @ORM\Index(name="$CustomerGUID", columns={"GUID"}), @ORM\Index(name="$AddressID", columns={"AddressID"})})
 * @ORM\Entity
 */
class Tblcustomers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CustomerID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customerid;

    /**
     * @var string
     *
     * @ORM\Column(name="GUID", type="string", length=40, nullable=true)
     */
    private $guid;

    /**
     * @var string
     *
     * @ORM\Column(name="CustomerNo", type="string", length=10, nullable=true)
     */
    private $customerno;

    /**
     * @var float
     *
     * @ORM\Column(name="Balance", type="float", precision=10, scale=0, nullable=true)
     */
    private $balance = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Prefix", type="string", length=50, nullable=true)
     */
    private $prefix;

    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=50, nullable=true)
     */
    private $firstname;

    /**
     * @var \DateTime
     * @Assert\NotNull(
     *      message="Enter a valid date."
     * )
     * @Assert\DateTime(
     *      message="Not a valid date."
     * )
     * @ORM\Column(name="BirthDate", type="datetime")
     */
    private $birthdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="Gender", type="integer", nullable=true)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="Phone", type="string", length=50, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="IDNumber", type="string", length=2, nullable=true)
     */
    private $idnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="Identification", type="string", length=10, nullable=true)
     */
    private $identification;

    /**
     * @var integer
     *
     * @ORM\Column(name="TypeIdentification", type="integer", nullable=true)
     */
    private $typeidentification;

    /**
     * @var string
     *
     * @ORM\Column(name="MiniContainerNo", type="string", length=10, nullable=true)
     */
    private $minicontainerno;

    /**
     * @var integer
     *
     * @ORM\Column(name="DesiredContainers", type="integer", nullable=true)
     */
    private $desiredcontainers;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="AddressID", type="integer", nullable=true)
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
     * @ORM\Column(name="POBOX", type="string", length=10, nullable=true)
     */
    private $pobox;

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
     * @var boolean
     *
     * @ORM\Column(name="BCP", type="boolean", nullable=true)
     */
    private $bcp = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="GAKAddress_old", type="string", length=25, nullable=true)
     */
    private $gakaddressOld;

    /**
     * @var integer
     *
     * @ORM\Column(name="StreetNameID_old", type="integer", nullable=true)
     */
    private $streetnameidOld;

    /**
     * @var integer
     *
     * @ORM\Column(name="AddressNumber_old", type="integer", nullable=true)
     */
    private $addressnumberOld;

    /**
     * @var string
     *
     * @ORM\Column(name="AddressLetter_old", type="string", length=5, nullable=true)
     */
    private $addressletterOld;

    /**
     * @var string
     *
     * @ORM\Column(name="AddressExtraInfo_old", type="string", length=10, nullable=true)
     */
    private $addressextrainfoOld;

    /**
     * @var string
     *
     * @ORM\Column(name="AddressCode_old", type="string", length=10, nullable=true)
     */
    private $addresscodeOld;

    /**
     * @var boolean
     *
     * @ORM\Column(name="AddressIsUninhabited", type="boolean", nullable=true)
     */
    private $addressisuninhabited = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="Occupants", type="integer", nullable=true)
     */
    private $occupants;

    /**
     * @var string
     *
     * @ORM\Column(name="BussinessName", type="string", length=50, nullable=true)
     */
    private $bussinessname;

    /**
     * @var integer
     *
     * @ORM\Column(name="AddressType", type="integer", nullable=true)
     */
    private $addresstype;

    /**
     * @var integer
     *
     * @ORM\Column(name="AddressSubTypeID", type="integer", nullable=true)
     */
    private $addresssubtypeid;

    /**
     * @var integer
     *
     * @ORM\Column(name="StatusID", type="integer", nullable=true)
     */
    private $statusid;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deceased", type="boolean", nullable=true)
     */
    private $deceased;

    /**
     * @var string
     *
     * @ORM\Column(name="PostalCode", type="string", length=10, nullable=true)
     */
    private $postalcode;

    /**
     * @var integer
     *
     * @ORM\Column(name="TakenCareBy", type="integer", nullable=true)
     */
    private $takencareby;

    /**
     * @var string
     *
     * @ORM\Column(name="sys_UserOpnemer", type="string", length=50, nullable=true)
     */
    private $sysUseropnemer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sys_InDate", type="datetime", nullable=true)
     */
    private $sysIndate;

    /**
     * @var string
     *
     * @ORM\Column(name="sys_InUser", type="string", length=50, nullable=true)
     */
    private $sysInuser;

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
    private $notactive = 'b\'0\'';

    public function getCustomerid() {
        return $this->customerid;
    }
    
    public function getGuid() {
        return $this->guid;
    }
    
    public function getBirthdate()
    {
        return $this->birthdate;
    }
    
    public function getFirstName()
    {
        return $this->firstname;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }
    
}

