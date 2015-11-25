<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblsidemenudefaults
 *
 * @ORM\Table(name="tblsidemenudefaults", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})})
 * @ORM\Entity
 */
class Tblsidemenudefaults
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
     * @var boolean
     *
     * @ORM\Column(name="ShowHeader", type="boolean", nullable=true)
     */
    private $showheader = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="HeaderText", type="string", length=50, nullable=true)
     */
    private $headertext;

    /**
     * @var integer
     *
     * @ORM\Column(name="HeaderAlignment", type="integer", nullable=true)
     */
    private $headeralignment = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="HeaderFontName", type="string", length=50, nullable=true)
     */
    private $headerfontname;

    /**
     * @var integer
     *
     * @ORM\Column(name="HeaderFontSize", type="integer", nullable=true)
     */
    private $headerfontsize = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="HeaderFontBold", type="boolean", nullable=true)
     */
    private $headerfontbold = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="HeaderFontColor", type="integer", nullable=true)
     */
    private $headerfontcolor = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="HeaderFontItalic", type="boolean", nullable=true)
     */
    private $headerfontitalic = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="HeaderFontUnderLine", type="boolean", nullable=true)
     */
    private $headerfontunderline = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="HeaderFontStrikethrough", type="boolean", nullable=true)
     */
    private $headerfontstrikethrough = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="HeaderHeight", type="integer", nullable=true)
     */
    private $headerheight = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="HeaderFillEffect", type="string", length=50, nullable=true)
     */
    private $headerfilleffect;

    /**
     * @var integer
     *
     * @ORM\Column(name="HeaderFillEffectColor1", type="integer", nullable=true)
     */
    private $headerfilleffectcolor1 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="HeaderFillEffectColor2", type="integer", nullable=true)
     */
    private $headerfilleffectcolor2 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="HeaderFillEffectColor3", type="integer", nullable=true)
     */
    private $headerfilleffectcolor3 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="HeaderFillEffectColor4", type="integer", nullable=true)
     */
    private $headerfilleffectcolor4 = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="HeaderFillEffectDirection", type="boolean", nullable=true)
     */
    private $headerfilleffectdirection = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="HeaderFillEffectExtraWide", type="boolean", nullable=true)
     */
    private $headerfilleffectextrawide = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="HeaderHighlightSoftColor", type="boolean", nullable=true)
     */
    private $headerhighlightsoftcolor = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="HeaderHighlightColor", type="integer", nullable=true)
     */
    private $headerhighlightcolor = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="HeaderHighlightBold", type="boolean", nullable=true)
     */
    private $headerhighlightbold = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="HeaderHighlightUnderline", type="boolean", nullable=true)
     */
    private $headerhighlightunderline = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="ShowQuitIcon", type="boolean", nullable=true)
     */
    private $showquiticon = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="ShowFooter", type="boolean", nullable=true)
     */
    private $showfooter = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="FooterText", type="string", length=50, nullable=true)
     */
    private $footertext;

    /**
     * @var integer
     *
     * @ORM\Column(name="FooterAlignment", type="integer", nullable=true)
     */
    private $footeralignment = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="FooterFontName", type="string", length=50, nullable=true)
     */
    private $footerfontname;

    /**
     * @var integer
     *
     * @ORM\Column(name="FooterFontSize", type="integer", nullable=true)
     */
    private $footerfontsize = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="FooterFontBold", type="boolean", nullable=true)
     */
    private $footerfontbold = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="FooterFontColor", type="integer", nullable=true)
     */
    private $footerfontcolor = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="FooterFontItalic", type="boolean", nullable=true)
     */
    private $footerfontitalic = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="FooterFontUnderLine", type="boolean", nullable=true)
     */
    private $footerfontunderline = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="FooterFontStrikethrough", type="boolean", nullable=true)
     */
    private $footerfontstrikethrough = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="FooterHeight", type="integer", nullable=true)
     */
    private $footerheight = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="FooterFillEffect", type="string", length=50, nullable=true)
     */
    private $footerfilleffect;

    /**
     * @var integer
     *
     * @ORM\Column(name="FooterFillEffectColor1", type="integer", nullable=true)
     */
    private $footerfilleffectcolor1 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="FooterFillEffectColor2", type="integer", nullable=true)
     */
    private $footerfilleffectcolor2 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="FooterFillEffectColor3", type="integer", nullable=true)
     */
    private $footerfilleffectcolor3 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="FooterFillEffectColor4", type="integer", nullable=true)
     */
    private $footerfilleffectcolor4 = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="FooterFillEffectDirection", type="boolean", nullable=true)
     */
    private $footerfilleffectdirection = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="FooterFillEffectExtraWide", type="boolean", nullable=true)
     */
    private $footerfilleffectextrawide = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="FooterHighlightSoftColor", type="boolean", nullable=true)
     */
    private $footerhighlightsoftcolor = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="FooterHighlightColor", type="integer", nullable=true)
     */
    private $footerhighlightcolor = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="FooterHighlightBold", type="boolean", nullable=true)
     */
    private $footerhighlightbold = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="FooterHighlightUnderline", type="boolean", nullable=true)
     */
    private $footerhighlightunderline = '0';


}

