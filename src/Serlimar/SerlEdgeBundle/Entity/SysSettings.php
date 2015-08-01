<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SysSettings
 *
 * @ORM\Table(name="sys_settings")
 * @ORM\Entity
 */
class SysSettings
{
    /**
     * @var integer
     *
     * @ORM\Column(name="SettingsID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $settingsid;

    /**
     * @var integer
     *
     * @ORM\Column(name="inv_DueDay", type="integer", nullable=true)
     */
    private $invDueday;


}

