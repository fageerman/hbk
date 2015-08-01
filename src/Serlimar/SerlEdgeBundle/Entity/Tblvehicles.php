<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblvehicles
 *
 * @ORM\Table(name="tblvehicles")
 * @ORM\Entity
 */
class Tblvehicles
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
     * @var string
     *
     * @ORM\Column(name="vehicleid", type="string", length=10, nullable=true)
     */
    private $vehicleid;

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
     * @ORM\Column(name="externalCompanyId", type="string", length=10, nullable=true)
     */
    private $externalcompanyid;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Hauler", type="string", length=45, nullable=true)
     */
    private $hauler;

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
     * @var float
     *
     * @ORM\Column(name="tareweight", type="float", precision=10, scale=0, nullable=true)
     */
    private $tareweight;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="taredate", type="datetime", nullable=true)
     */
    private $taredate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ManualEntry", type="boolean", nullable=true)
     */
    private $manualentry = 'b\'0\'';

    /**
     * @var string
     *
     * @ORM\Column(name="ExternalManualEntry", type="string", length=1, nullable=true)
     */
    private $externalmanualentry;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TicketDate", type="datetime", nullable=true)
     */
    private $ticketdate;

    /**
     * @var string
     *
     * @ORM\Column(name="externalUseContainer", type="string", length=1, nullable=true)
     */
    private $externalusecontainer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="useContainer", type="boolean", nullable=true)
     */
    private $usecontainer = 'b\'0\'';

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

