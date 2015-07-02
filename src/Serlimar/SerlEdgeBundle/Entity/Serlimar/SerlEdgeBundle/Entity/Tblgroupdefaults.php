<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblgroupdefaults
 *
 * @ORM\Table(name="tblgroupdefaults", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})})
 * @ORM\Entity
 */
class Tblgroupdefaults
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="GroupAlignment", type="integer", nullable=true)
     */
    private $groupalignment = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="GroupFontName", type="string", length=50, nullable=true)
     */
    private $groupfontname;

    /**
     * @var integer
     *
     * @ORM\Column(name="GroupFontSize", type="integer", nullable=true)
     */
    private $groupfontsize = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="GroupFontBold", type="boolean", nullable=true)
     */
    private $groupfontbold = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="GroupFontColor", type="integer", nullable=true)
     */
    private $groupfontcolor = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="GroupFontItalic", type="boolean", nullable=true)
     */
    private $groupfontitalic = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="GroupFontUnderLine", type="boolean", nullable=true)
     */
    private $groupfontunderline = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="GroupFontStrikethrough", type="boolean", nullable=true)
     */
    private $groupfontstrikethrough = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ButtonHeight", type="integer", nullable=true)
     */
    private $buttonheight = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ButtonWidth", type="integer", nullable=true)
     */
    private $buttonwidth = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="GroupFillEffect", type="string", length=50, nullable=true)
     */
    private $groupfilleffect;

    /**
     * @var integer
     *
     * @ORM\Column(name="FillEffectColor1", type="integer", nullable=true)
     */
    private $filleffectcolor1 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="FillEffectColor2", type="integer", nullable=true)
     */
    private $filleffectcolor2 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="FillEffectColor3", type="integer", nullable=true)
     */
    private $filleffectcolor3 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="FillEffectColor4", type="integer", nullable=true)
     */
    private $filleffectcolor4 = '0';

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
     * @var integer
     *
     * @ORM\Column(name="HighlightColor1", type="integer", nullable=true)
     */
    private $highlightcolor1 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="HighlightColor2", type="integer", nullable=true)
     */
    private $highlightcolor2 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="HighlightColor3", type="integer", nullable=true)
     */
    private $highlightcolor3 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="HighlightColor4", type="integer", nullable=true)
     */
    private $highlightcolor4 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ActiveColor1", type="integer", nullable=true)
     */
    private $activecolor1 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ActiveColor2", type="integer", nullable=true)
     */
    private $activecolor2 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ActiveColor3", type="integer", nullable=true)
     */
    private $activecolor3 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ActiveColor4", type="integer", nullable=true)
     */
    private $activecolor4 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ActiveHighlightColor1", type="integer", nullable=true)
     */
    private $activehighlightcolor1 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ActiveHighlightColor2", type="integer", nullable=true)
     */
    private $activehighlightcolor2 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ActiveHighlightColor3", type="integer", nullable=true)
     */
    private $activehighlightcolor3 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ActiveHighlightColor4", type="integer", nullable=true)
     */
    private $activehighlightcolor4 = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="HighlightSoftColor", type="boolean", nullable=true)
     */
    private $highlightsoftcolor = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="HighlightColor", type="integer", nullable=true)
     */
    private $highlightcolor = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="HighlightBold", type="boolean", nullable=true)
     */
    private $highlightbold = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="HighlightUnderline", type="boolean", nullable=true)
     */
    private $highlightunderline = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="Default", type="boolean", nullable=true)
     */
    private $default = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="GroupHandCursor", type="boolean", nullable=true)
     */
    private $grouphandcursor = '0';


}

