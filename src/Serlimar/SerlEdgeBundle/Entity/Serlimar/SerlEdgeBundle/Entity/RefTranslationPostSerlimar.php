<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RefTranslationPostSerlimar
 *
 * @ORM\Table(name="ref_translation_post_serlimar")
 * @ORM\Entity
 */
class RefTranslationPostSerlimar
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
     * @var float
     *
     * @ORM\Column(name="Straatkode Gba", type="float", precision=10, scale=0, nullable=true)
     */
    private $straatkodeGba;

    /**
     * @var string
     *
     * @ORM\Column(name="Straatnaam", type="string", length=100, nullable=true)
     */
    private $straatnaam;

    /**
     * @var string
     *
     * @ORM\Column(name="Straatnaam_lnk", type="string", length=50, nullable=true)
     */
    private $straatnaamLnk;

    /**
     * @var string
     *
     * @ORM\Column(name="StraatNaam_POST", type="string", length=100, nullable=true)
     */
    private $straatnaamPost;

    /**
     * @var string
     *
     * @ORM\Column(name="SSMA_TimeStamp", type="blob", nullable=true)
     */
    private $ssmaTimestamp;


}

