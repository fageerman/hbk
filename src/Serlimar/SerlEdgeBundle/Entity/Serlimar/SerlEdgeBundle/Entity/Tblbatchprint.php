<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblbatchprint
 *
 * @ORM\Table(name="tblbatchprint")
 * @ORM\Entity
 */
class Tblbatchprint
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
     * @var integer
     *
     * @ORM\Column(name="Period", type="integer", nullable=true)
     */
    private $period = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="Batch", type="integer", nullable=true)
     */
    private $batch = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="Select", type="boolean", nullable=true)
     */
    private $select = 'b\'0\'';

    /**
     * @var integer
     *
     * @ORM\Column(name="StreetnameID", type="integer", nullable=true)
     */
    private $streetnameid;

    /**
     * @var string
     *
     * @ORM\Column(name="Streetname", type="string", length=100, nullable=true)
     */
    private $streetname;

    /**
     * @var integer
     *
     * @ORM\Column(name="Pages", type="integer", nullable=true)
     */
    private $pages = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Executed", type="datetime", nullable=true)
     */
    private $executed;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Completed", type="boolean", nullable=true)
     */
    private $completed = 'b\'0\'';

    /**
     * @var string
     *
     * @ORM\Column(name="Printer", type="string", length=255, nullable=true)
     */
    private $printer;


}

