<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblsidemenuprocs
 *
 * @ORM\Table(name="tblsidemenuprocs")
 * @ORM\Entity
 */
class Tblsidemenuprocs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ProcID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $procid;

    /**
     * @var string
     *
     * @ORM\Column(name="ProcNameStr", type="string", length=75, nullable=true)
     */
    private $procnamestr;

    /**
     * @var string
     *
     * @ORM\Column(name="ProcType", type="string", length=7, nullable=true)
     */
    private $proctype;

    /**
     * @var string
     *
     * @ORM\Column(name="ProcArguments", type="string", length=255, nullable=true)
     */
    private $procarguments;

    /**
     * @var integer
     *
     * @ORM\Column(name="ProcArgumentsNum", type="integer", nullable=true)
     */
    private $procargumentsnum;


}

