<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RefTakencareby
 *
 * @ORM\Table(name="ref_takencareby")
 * @ORM\Entity
 */
class RefTakencareby
{
    /**
     * @var integer
     *
     * @ORM\Column(name="TakeCareByID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $takecarebyid;

    /**
     * @var string
     *
     * @ORM\Column(name="TakenCareBy", type="string", length=10, nullable=true)
     */
    private $takencareby;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Active", type="boolean", nullable=true)
     */
    private $active = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="InUser", type="string", length=20, nullable=true)
     */
    private $inuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InDate", type="datetime", nullable=true)
     */
    private $indate;

    /**
     * @var string
     *
     * @ORM\Column(name="SSMA_TimeStamp", type="blob", nullable=true)
     */
    private $ssmaTimestamp;


}

