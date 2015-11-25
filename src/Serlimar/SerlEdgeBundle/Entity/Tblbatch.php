<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblbatch
 *
 * @ORM\Table(name="tblbatch", indexes={@ORM\Index(name="$Register", columns={"RegisterGUID"}), @ORM\Index(name="$BachNR", columns={"Batchnr"}), @ORM\Index(name="$Reference", columns={"Reference"}), @ORM\Index(name="$Date", columns={"Batchdate"})})
 * @ORM\Entity
 */
class Tblbatch
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
     * @ORM\Column(name="RegisterGUID", type="string", length=40, nullable=true)
     */
    private $registerguid;

    /**
     * @var integer
     *
     * @ORM\Column(name="Batchnr", type="integer", nullable=true)
     */
    private $batchnr;

    /**
     * @var string
     *
     * @ORM\Column(name="Reference", type="string", length=50, nullable=true)
     */
    private $reference;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Batchdate", type="datetime", nullable=true)
     */
    private $batchdate;

    /**
     * @var float
     *
     * @ORM\Column(name="BOD", type="float", precision=10, scale=0, nullable=true)
     */
    private $bod;

    /**
     * @var float
     *
     * @ORM\Column(name="EOD", type="float", precision=10, scale=0, nullable=true)
     */
    private $eod;

    /**
     * @var integer
     *
     * @ORM\Column(name="Transactions", type="integer", nullable=true)
     */
    private $transactions = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Notes", type="text", nullable=true)
     */
    private $notes;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Closed", type="boolean", nullable=true)
     */
    private $closed = 'b\'0\'';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ClosesDateTime", type="datetime", nullable=true)
     */
    private $closesdatetime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Canceled", type="boolean", nullable=true)
     */
    private $canceled = 'b\'0\'';

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


}

