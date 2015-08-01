<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblsidemenuitem
 *
 * @ORM\Table(name="tblsidemenuitem", indexes={@ORM\Index(name="MenuItemID", columns={"MenuItemID"})})
 * @ORM\Entity
 */
class Tblsidemenuitem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="MenuItemID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $menuitemid;

    /**
     * @var string
     *
     * @ORM\Column(name="MenuItemText", type="string", length=50, nullable=true)
     */
    private $menuitemtext;

    /**
     * @var string
     *
     * @ORM\Column(name="MenuItemDescription", type="string", length=50, nullable=true)
     */
    private $menuitemdescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="MenuItemParent", type="integer", nullable=true)
     */
    private $menuitemparent = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="MenuItemOrder", type="integer", nullable=true)
     */
    private $menuitemorder = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="MenuItemAction", type="integer", nullable=true)
     */
    private $menuitemaction = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="MenuItemTarget", type="string", length=50, nullable=true)
     */
    private $menuitemtarget;

    /**
     * @var string
     *
     * @ORM\Column(name="MenuItemProc", type="string", length=75, nullable=true)
     */
    private $menuitemproc;

    /**
     * @var string
     *
     * @ORM\Column(name="MenuItemTargetMode", type="string", length=50, nullable=true)
     */
    private $menuitemtargetmode;

    /**
     * @var string
     *
     * @ORM\Column(name="MenuItemArguments", type="string", length=50, nullable=true)
     */
    private $menuitemarguments;

    /**
     * @var string
     *
     * @ORM\Column(name="MenuItemIcon", type="string", length=255, nullable=true)
     */
    private $menuitemicon;

    /**
     * @var integer
     *
     * @ORM\Column(name="MenuItemIconNumber", type="integer", nullable=true)
     */
    private $menuitemiconnumber = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="MenuItemAccess", type="integer", nullable=true)
     */
    private $menuitemaccess = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="MenuItemStatus", type="boolean", nullable=true)
     */
    private $menuitemstatus = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="Active", type="boolean", nullable=true)
     */
    private $active = '-1';

    /**
     * @var string
     *
     * @ORM\Column(name="MenuItemWhereCondition", type="string", length=50, nullable=true)
     */
    private $menuitemwherecondition;


}

