<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RefUseropnemer
 *
 * @ORM\Table(name="ref_useropnemer")
 * @ORM\Entity
 */
class RefUseropnemer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="UserOpnemerID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $useropnemerid;

    /**
     * @var string
     *
     * @ORM\Column(name="UserOpnemer", type="string", length=50, nullable=true)
     */
    private $useropnemer;


}

