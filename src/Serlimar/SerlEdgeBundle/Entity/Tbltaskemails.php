<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbltaskemails
 *
 * @ORM\Table(name="tbltaskemails", indexes={@ORM\Index(name="Task", columns={"TaskGUID"})})
 * @ORM\Entity
 */
class Tbltaskemails
{
    /**
     * @var string
     *
     * @ORM\Column(name="GUID", type="string", length=40)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $guid;

    /**
     * @var string
     *
     * @ORM\Column(name="TaskGUID", type="string", length=40, nullable=true)
     */
    private $taskguid;

    /**
     * @var string
     *
     * @ORM\Column(name="User", type="string", length=50, nullable=true)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="SendType", type="string", length=10, nullable=true)
     */
    private $sendtype;

    /**
     * @var string
     *
     * @ORM\Column(name="Notes", type="text", nullable=true)
     */
    private $notes;

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
     * @var string
     *
     * @ORM\Column(name="UserAction", type="string", length=150, nullable=true)
     */
    private $useraction;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UserActionDate", type="datetime", nullable=true)
     */
    private $useractiondate;

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

