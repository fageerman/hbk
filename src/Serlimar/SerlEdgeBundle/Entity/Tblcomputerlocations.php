<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblcomputerlocations
 *
 * @ORM\Table(name="tblcomputerlocations", indexes={@ORM\Index(name="$LoacationGUID", columns={"LocationGUID"}), @ORM\Index(name="$Computer", columns={"Computername"})})
 * @ORM\Entity
 */
class Tblcomputerlocations
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
     * @ORM\Column(name="Computername", type="string", length=100, nullable=true)
     */
    private $computername;

    /**
     * @var string
     *
     * @ORM\Column(name="LocationGUID", type="string", length=45, nullable=true)
     */
    private $locationguid;

    /**
     * @var string
     *
     * @ORM\Column(name="IPAddress", type="string", length=255, nullable=true)
     */
    private $ipaddress;

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="text", nullable=true)
     */
    private $note;

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

