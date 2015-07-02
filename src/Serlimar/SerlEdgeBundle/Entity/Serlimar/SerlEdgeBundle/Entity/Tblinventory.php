<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblinventory
 *
 * @ORM\Table(name="tblinventory", indexes={@ORM\Index(name="InventoryNo", columns={"InventoryNo"})})
 * @ORM\Entity
 */
class Tblinventory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="InventoryID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $inventoryid;

    /**
     * @var integer
     *
     * @ORM\Column(name="InventoryType", type="integer", nullable=true)
     */
    private $inventorytype;

    /**
     * @var string
     *
     * @ORM\Column(name="InventoryNo", type="string", length=10, nullable=true)
     */
    private $inventoryno;

    /**
     * @var integer
     *
     * @ORM\Column(name="Status", type="integer", nullable=true)
     */
    private $status;

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
     * @var boolean
     *
     * @ORM\Column(name="isReady", type="boolean", nullable=true)
     */
    private $isready = '0';

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

