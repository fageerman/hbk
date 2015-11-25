<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblroles
 *
 * @ORM\Table(name="tblroles")
 * @ORM\Entity
 */
class Tblroles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="entity", type="string", length=45, nullable=true)
     */
    private $entity;

    /**
     * @var string
     *
     * @ORM\Column(name="operation", type="string", length=45, nullable=true)
     */
    private $operation;

    /**
     * @var string
     *
     * @ORM\Column(name="uri", type="string", length=60, nullable=false)
     */
    private $uri;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getEntity() {
        return $this->entity;
    }

    function getOperation() {
        return $this->operation;
    }

    function getUri() {
        return $this->uri;
    }


    function setName($name) {
        $this->name = $name;
    }

    function setEntity($entity) {
        $this->entity = $entity;
    }

    function setOperation($operation) {
        $this->operation = $operation;
    }

    function setUri($uri) {
        $this->uri = $uri;
    }


}
