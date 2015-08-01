<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbluseraccesslevel
 *
 * @ORM\Table(name="tbluseraccesslevel")
 * @ORM\Entity
 */
class Tbluseraccesslevel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="AccessLevelID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $accesslevelid;

    /**
     * @var string
     *
     * @ORM\Column(name="AccessLevel", type="string", length=255, nullable=true)
     */
    private $accesslevel;


}

