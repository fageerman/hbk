<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RefPostAdresen
 *
 * @ORM\Table(name="ref_post_adresen")
 * @ORM\Entity
 */
class RefPostAdresen
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
     * @var string
     *
     * @ORM\Column(name="STREET_NAM", type="string", length=255, nullable=true)
     */
    private $streetNam;

    /**
     * @var float
     *
     * @ORM\Column(name="STREET_NUM", type="float", precision=10, scale=0, nullable=true)
     */
    private $streetNum;

    /**
     * @var string
     *
     * @ORM\Column(name="STREET_SUF", type="string", length=255, nullable=true)
     */
    private $streetSuf;

    /**
     * @var string
     *
     * @ORM\Column(name="APARTMENT", type="string", length=255, nullable=true)
     */
    private $apartment;

    /**
     * @var float
     *
     * @ORM\Column(name="Code1", type="float", precision=10, scale=0, nullable=true)
     */
    private $code1;

    /**
     * @var string
     *
     * @ORM\Column(name="SSMA_TimeStamp", type="blob", nullable=true)
     */
    private $ssmaTimestamp;


}

