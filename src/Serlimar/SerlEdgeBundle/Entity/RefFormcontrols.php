<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RefFormcontrols
 *
 * @ORM\Table(name="ref_formcontrols")
 * @ORM\Entity
 */
class RefFormcontrols
{
    /**
     * @var integer
     *
     * @ORM\Column(name="FormControlsID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $formcontrolsid;

    /**
     * @var string
     *
     * @ORM\Column(name="FormControl", type="string", length=20, nullable=true)
     */
    private $formcontrol;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=50, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Location", type="string", length=50, nullable=true)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="Option", type="string", length=10, nullable=true)
     */
    private $option;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=10, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="GoupNo", type="integer", nullable=true)
     */
    private $goupno;

    /**
     * @var integer
     *
     * @ORM\Column(name="SortNo", type="integer", nullable=true)
     */
    private $sortno;


}

