<?php

namespace Redstar\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="redstar_users")
 * @ORM\Entity(repositoryClass="Redstar\UserBundle\Entity\UserRepository")
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=25, precision=0, scale=0, nullable=false, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64, precision=0, scale=0, nullable=false, unique=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, precision=0, scale=0, nullable=false, unique=true)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $isActive;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=64, precision=0, scale=0, nullable=false, unique=false)
     */
    private $salt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Redstar\UserBundle\Entity\Role", inversedBy="users")
     * @ORM\JoinTable(name="user_role",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="role_id", referencedColumnName="id", onDelete="CASCADE")
     *   }
     * )
     */
    private $roles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

