<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblmessages
 *
 * @ORM\Table(name="tblmessages")
 * @ORM\Entity
 */
class Tblmessages
{
    /**
     * @var integer
     *
     * @ORM\Column(name="MessageID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $messageid;

    /**
     * @var string
     *
     * @ORM\Column(name="Message", type="text", nullable=true)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="MsgBeginDate", type="datetime", nullable=true)
     */
    private $msgbegindate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="msgEndDate", type="datetime", nullable=true)
     */
    private $msgenddate;

    /**
     * @var string
     *
     * @ORM\Column(name="msgUser", type="string", length=25, nullable=true)
     */
    private $msguser;

    /**
     * @var integer
     *
     * @ORM\Column(name="msgColor", type="integer", nullable=true)
     */
    private $msgcolor;

    /**
     * @var string
     *
     * @ORM\Column(name="PostedBy", type="string", length=25, nullable=true)
     */
    private $postedby;

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

