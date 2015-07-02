<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblcompanies
 *
 * @ORM\Table(name="tblcompanies")
 * @ORM\Entity
 */
class Tblcompanies
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
     * @ORM\Column(name="companyid", type="integer", nullable=true)
     */
    private $companyid;

    /**
     * @var string
     *
     * @ORM\Column(name="ExternalCompanyID", type="string", length=45, nullable=true)
     */
    private $externalcompanyid;

    /**
     * @var string
     *
     * @ORM\Column(name="companyshortname", type="string", length=10, nullable=true)
     */
    private $companyshortname;

    /**
     * @var string
     *
     * @ORM\Column(name="companyname", type="string", length=45, nullable=true)
     */
    private $companyname;

    /**
     * @var integer
     *
     * @ORM\Column(name="addressid", type="integer", nullable=true)
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
     * @ORM\Column(name="address", type="string", length=100, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=45, nullable=true)
     */
    private $source;

    /**
     * @var string
     *
     * @ORM\Column(name="SourceGUID", type="string", length=40, nullable=true)
     */
    private $sourceguid;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=45, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="Fax", type="string", length=45, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=45, nullable=true)
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="DefaultMaterialGUID", type="string", length=40, nullable=true)
     */
    private $defaultmaterialguid;

    /**
     * @var string
     *
     * @ORM\Column(name="ExternalDefaultMaterial", type="string", length=45, nullable=true)
     */
    private $externaldefaultmaterial;

    /**
     * @var integer
     *
     * @ORM\Column(name="terms", type="integer", nullable=true)
     */
    private $terms;

    /**
     * @var float
     *
     * @ORM\Column(name="accountbalance", type="float", precision=10, scale=0, nullable=true)
     */
    private $accountbalance;

    /**
     * @var float
     *
     * @ORM\Column(name="creditlimit", type="float", precision=10, scale=0, nullable=true)
     */
    private $creditlimit;

    /**
     * @var string
     *
     * @ORM\Column(name="CompanyTypeGUID", type="string", length=40, nullable=true)
     */
    private $companytypeguid;

    /**
     * @var string
     *
     * @ORM\Column(name="KvkNo", type="string", length=25, nullable=true)
     */
    private $kvkno;

    /**
     * @var integer
     *
     * @ORM\Column(name="PersoonNo", type="integer", nullable=true)
     */
    private $persoonno;

    /**
     * @var string
     *
     * @ORM\Column(name="CompanyBankGUID", type="string", length=40, nullable=true)
     */
    private $companybankguid;

    /**
     * @var string
     *
     * @ORM\Column(name="CompanyAccount", type="string", length=25, nullable=true)
     */
    private $companyaccount;

    /**
     * @var string
     *
     * @ORM\Column(name="POBOX", type="string", length=25, nullable=true)
     */
    private $pobox;

    /**
     * @var string
     *
     * @ORM\Column(name="AuthorizedSalutationGUID", type="string", length=40, nullable=true)
     */
    private $authorizedsalutationguid;

    /**
     * @var string
     *
     * @ORM\Column(name="AuthorizedName", type="string", length=100, nullable=true)
     */
    private $authorizedname;

    /**
     * @var string
     *
     * @ORM\Column(name="IdentificationTypeGUID", type="string", length=40, nullable=true)
     */
    private $identificationtypeguid;

    /**
     * @var string
     *
     * @ORM\Column(name="Identification", type="string", length=15, nullable=true)
     */
    private $identification;

    /**
     * @var string
     *
     * @ORM\Column(name="AuhtorizedFunctionGUID", type="string", length=40, nullable=true)
     */
    private $auhtorizedfunctionguid;

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

