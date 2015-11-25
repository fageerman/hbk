<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SysNumbers
 *
 * @ORM\Table(name="sys_numbers")
 * @ORM\Entity
 */
class SysNumbers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Numbers", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numbers;


}

