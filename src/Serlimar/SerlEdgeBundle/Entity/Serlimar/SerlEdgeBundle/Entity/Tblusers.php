<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblusers
 *
 * @ORM\Table(name="tblusers", indexes={@ORM\Index(name="FirstName", columns={"FirstName"}), @ORM\Index(name="LastName", columns={"LastName"}), @ORM\Index(name="Username", columns={"Username"})})
 * @ORM\Entity
 */
class Tblusers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="UserID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=25, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=25, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="Username", type="string", length=25, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=254, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=50, nullable=true)
     */
    private $salt;

    /**
     * @var integer
     *
     * @ORM\Column(name="userAccessLevel", type="integer", nullable=true)
     */
    private $useraccesslevel;

    /**
     * @var string
     *
     * @ORM\Column(name="Shortname", type="string", length=5, nullable=true)
     */
    private $shortname;

    /**
     * @var string
     *
     * @ORM\Column(name="Nota", type="text", nullable=true)
     */
    private $nota;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LoggedIN", type="datetime", nullable=true)
     */
    private $loggedin;

    /**
     * @var string
     *
     * @ORM\Column(name="ComputerName", type="string", length=50, nullable=true)
     */
    private $computername;

    /**
     * @var string
     *
     * @ORM\Column(name="Firma", type="string", length=50, nullable=true)
     */
    private $firma;

    /**
     * @var string
     *
     * @ORM\Column(name="Functie", type="string", length=25, nullable=true)
     */
    private $functie;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Kickout", type="boolean", nullable=true)
     */
    private $kickout = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="KickoutTime", type="integer", nullable=true)
     */
    private $kickouttime;

    /**
     * @var string
     *
     * @ORM\Column(name="KickoutMessage", type="string", length=255, nullable=true)
     */
    private $kickoutmessage;

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

