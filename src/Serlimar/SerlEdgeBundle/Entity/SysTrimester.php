<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SysTrimester
 *
 * @ORM\Table(name="sys_trimester")
 * @ORM\Entity
 */
class SysTrimester
{
    /**
     * @var integer
     *
     * @ORM\Column(name="TrimesterID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $trimesterid;

    /**
     * @var integer
     *
     * @ORM\Column(name="Trimester", type="integer", nullable=true)
     */
    private $trimester;

    /**
     * @var integer
     *
     * @ORM\Column(name="TrimesterMonthOrder", type="integer", nullable=true)
     */
    private $trimestermonthorder;

    /**
     * @var integer
     *
     * @ORM\Column(name="TrimesterMonthSerial", type="integer", nullable=true)
     */
    private $trimestermonthserial;

    /**
     * @var string
     *
     * @ORM\Column(name="TrimesterMonth", type="string", length=50, nullable=true)
     */
    private $trimestermonth;


}

