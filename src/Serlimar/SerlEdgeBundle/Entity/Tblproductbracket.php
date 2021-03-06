<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblproductbracket
 *
 * @ORM\Table(name="tblproductbracket")
 * @ORM\Entity
 */
class Tblproductbracket
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
     * @var integer
     *
     * @ORM\Column(name="ProductBracketID", type="integer", nullable=true)
     */
    private $productbracketid;

    /**
     * @var integer
     *
     * @ORM\Column(name="ProductsID", type="integer", nullable=true)
     */
    private $productsid;

    /**
     * @var string
     *
     * @ORM\Column(name="ProductGUID", type="string", length=40, nullable=true)
     */
    private $productguid;

    /**
     * @var float
     *
     * @ORM\Column(name="Cost", type="float", precision=10, scale=0, nullable=true)
     */
    private $cost = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="Weight1", type="float", precision=10, scale=0, nullable=true)
     */
    private $weight1;

    /**
     * @var float
     *
     * @ORM\Column(name="Weight2", type="float", precision=10, scale=0, nullable=true)
     */
    private $weight2;

    /**
     * @var float
     *
     * @ORM\Column(name="Rate", type="float", precision=10, scale=0, nullable=true)
     */
    private $rate = '0';

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

