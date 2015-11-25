<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblreceiptitems
 *
 * @ORM\Table(name="tblreceiptitems")
 * @ORM\Entity
 */
class Tblreceiptitems
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
     * @ORM\Column(name="ReceiptsGUID", type="string", length=40, nullable=true)
     */
    private $receiptsguid;

    /**
     * @var string
     *
     * @ORM\Column(name="ProductGUID", type="string", length=40, nullable=true)
     */
    private $productguid;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=150, nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="Qty", type="float", precision=10, scale=0, nullable=true)
     */
    private $qty = '1';

    /**
     * @var float
     *
     * @ORM\Column(name="Rate", type="float", precision=10, scale=0, nullable=true)
     */
    private $rate = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="Total", type="float", precision=10, scale=0, nullable=true)
     */
    private $total = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="Costs", type="float", precision=10, scale=0, nullable=true)
     */
    private $costs = '0';

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
     * @ORM\Column(name="UserID", type="string", length=50, nullable=true)
     */
    private $userid;

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
     * @var float
     *
     * @ORM\Column(name="Version", type="float", precision=10, scale=0, nullable=true)
     */
    private $version;


}

