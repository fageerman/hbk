<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblmaterials
 *
 * @ORM\Table(name="tblmaterials")
 * @ORM\Entity
 */
class Tblmaterials
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
     * @ORM\Column(name="ProductID", type="integer", nullable=true)
     */
    private $productid;

    /**
     * @var string
     *
     * @ORM\Column(name="ProductGUID", type="string", length=40, nullable=true)
     */
    private $productguid;

    /**
     * @var string
     *
     * @ORM\Column(name="Material", type="string", length=45, nullable=true)
     */
    private $material;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Inbound", type="boolean", nullable=true)
     */
    private $inbound = 'b\'1\'';

    /**
     * @var boolean
     *
     * @ORM\Column(name="Type", type="boolean", nullable=true)
     */
    private $type = 'b\'1\'';

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=25, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Unit", type="string", length=10, nullable=true)
     */
    private $unit;

    /**
     * @var float
     *
     * @ORM\Column(name="ChargeAmount1", type="float", precision=10, scale=0, nullable=true)
     */
    private $chargeamount1 = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="ChargeAmount2", type="float", precision=10, scale=0, nullable=true)
     */
    private $chargeamount2 = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="ChargeAmount3", type="float", precision=10, scale=0, nullable=true)
     */
    private $chargeamount3 = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="ChargeAmount4", type="float", precision=10, scale=0, nullable=true)
     */
    private $chargeamount4 = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="Cost", type="float", precision=10, scale=0, nullable=true)
     */
    private $cost = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="MinimumCharge", type="float", precision=10, scale=0, nullable=true)
     */
    private $minimumcharge = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Location", type="string", length=10, nullable=true)
     */
    private $location;

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

