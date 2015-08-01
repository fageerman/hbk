<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblkickout
 *
 * @ORM\Table(name="tblkickout")
 * @ORM\Entity
 */
class Tblkickout
{
    /**
     * @var integer
     *
     * @ORM\Column(name="KickoutID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $kickoutid;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Kickout", type="boolean", nullable=true)
     */
    private $kickout = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="KickoutTimeOut", type="integer", nullable=true)
     */
    private $kickouttimeout;

    /**
     * @var string
     *
     * @ORM\Column(name="Remark", type="string", length=255, nullable=true)
     */
    private $remark;

    /**
     * @var boolean
     *
     * @ORM\Column(name="RestartClient", type="boolean", nullable=true)
     */
    private $restartclient = '0';

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
    private $notactive = 'b\'0\'';


}

