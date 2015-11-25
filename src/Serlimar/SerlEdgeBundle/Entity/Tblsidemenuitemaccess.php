<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblsidemenuitemaccess
 *
 * @ORM\Table(name="tblsidemenuitemaccess", indexes={@ORM\Index(name="AccessLevelID", columns={"AccessLevelID"})})
 * @ORM\Entity
 */
class Tblsidemenuitemaccess
{
    /**
     * @var integer
     *
     * @ORM\Column(name="MenuItemID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $menuitemid;

    /**
     * @var integer
     *
     * @ORM\Column(name="AccessLevelID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $accesslevelid;


}

