<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SysMonths
 *
 * @ORM\Table(name="sys_months")
 * @ORM\Entity
 */
class SysMonths
{
    /**
     * @var integer
     *
     * @ORM\Column(name="MonthsID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $monthsid;

    /**
     * @var string
     *
     * @ORM\Column(name="Month_Eng", type="string", length=50, nullable=true)
     */
    private $monthEng;

    /**
     * @var string
     *
     * @ORM\Column(name="Month_Ned", type="string", length=50, nullable=true)
     */
    private $monthNed;


}

