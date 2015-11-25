<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblitemdefaults
 *
 * @ORM\Table(name="tblitemdefaults", uniqueConstraints={@ORM\UniqueConstraint(name="MenuItemID_UNIQUE", columns={"MenuItemID"})}, indexes={@ORM\Index(name="MenuItemID", columns={"MenuItemID"})})
 * @ORM\Entity
 */
class Tblitemdefaults
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
     * @var boolean
     *
     * @ORM\Column(name="Default", type="boolean", nullable=true)
     */
    private $default = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ItemInterval", type="integer", nullable=true)
     */
    private $iteminterval = '50';

    /**
     * @var boolean
     *
     * @ORM\Column(name="ItemHighlightSoftColor", type="boolean", nullable=true)
     */
    private $itemhighlightsoftcolor = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ItemHighlightColor", type="integer", nullable=true)
     */
    private $itemhighlightcolor = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="ItemHighlightBold", type="boolean", nullable=true)
     */
    private $itemhighlightbold = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="ItemHighlightUnderline", type="boolean", nullable=true)
     */
    private $itemhighlightunderline = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ItemAlignment", type="integer", nullable=true)
     */
    private $itemalignment = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ItemFontName", type="string", length=50, nullable=true)
     */
    private $itemfontname = 'Tahoma';

    /**
     * @var integer
     *
     * @ORM\Column(name="ItemFontSize", type="integer", nullable=true)
     */
    private $itemfontsize = '8';

    /**
     * @var boolean
     *
     * @ORM\Column(name="ItemFontBold", type="boolean", nullable=true)
     */
    private $itemfontbold = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ItemFontColor", type="integer", nullable=true)
     */
    private $itemfontcolor = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="ItemFontItalic", type="boolean", nullable=true)
     */
    private $itemfontitalic = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="ItemFontUnderLine", type="boolean", nullable=true)
     */
    private $itemfontunderline = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="ItemFontStrikethrough", type="boolean", nullable=true)
     */
    private $itemfontstrikethrough = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ItemPaneFillEffect", type="string", length=50, nullable=true)
     */
    private $itempanefilleffect = 'Solid Color';

    /**
     * @var integer
     *
     * @ORM\Column(name="FillEffectColor1", type="integer", nullable=true)
     */
    private $filleffectcolor1 = '16777215';

    /**
     * @var integer
     *
     * @ORM\Column(name="FillEffectColor2", type="integer", nullable=true)
     */
    private $filleffectcolor2 = '16777215';

    /**
     * @var integer
     *
     * @ORM\Column(name="FillEffectColor3", type="integer", nullable=true)
     */
    private $filleffectcolor3 = '16777215';

    /**
     * @var integer
     *
     * @ORM\Column(name="FillEffectColor4", type="integer", nullable=true)
     */
    private $filleffectcolor4 = '16777215';

    /**
     * @var boolean
     *
     * @ORM\Column(name="FillEffectDirection", type="boolean", nullable=true)
     */
    private $filleffectdirection = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="FillEffectExtraWide", type="boolean", nullable=true)
     */
    private $filleffectextrawide = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="ItemHandCursor", type="boolean", nullable=true)
     */
    private $itemhandcursor = '0';


}

