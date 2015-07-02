<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RefLayout
 *
 * @ORM\Table(name="ref_layout")
 * @ORM\Entity
 */
class RefLayout
{
    /**
     * @var integer
     *
     * @ORM\Column(name="LayoutID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $layoutid;

    /**
     * @var integer
     *
     * @ORM\Column(name="Grp", type="integer", nullable=true)
     */
    private $grp;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer", nullable=true)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Value", type="text", nullable=true)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="Sort", type="integer", nullable=true)
     */
    private $sort;

    /**
     * @var string
     *
     * @ORM\Column(name="Form", type="string", length=50, nullable=true)
     */
    private $form;

    /**
     * @var string
     *
     * @ORM\Column(name="Report", type="string", length=50, nullable=true)
     */
    private $report;

    /**
     * @var string
     *
     * @ORM\Column(name="Control", type="string", length=40, nullable=true)
     */
    private $control;

    /**
     * @var string
     *
     * @ORM\Column(name="Property", type="string", length=50, nullable=true)
     */
    private $property;

    /**
     * @var string
     *
     * @ORM\Column(name="Default", type="string", length=255, nullable=true)
     */
    private $default;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Setup", type="boolean", nullable=true)
     */
    private $setup = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Option", type="string", length=50, nullable=true)
     */
    private $option;

    /**
     * @var string
     *
     * @ORM\Column(name="XtraOption", type="string", length=50, nullable=true)
     */
    private $xtraoption;

    /**
     * @var string
     *
     * @ORM\Column(name="XtraOption2", type="string", length=50, nullable=true)
     */
    private $xtraoption2;

    /**
     * @var string
     *
     * @ORM\Column(name="Language", type="string", length=20, nullable=true)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="SSMA_TimeStamp", type="blob", nullable=true)
     */
    private $ssmaTimestamp;


}

