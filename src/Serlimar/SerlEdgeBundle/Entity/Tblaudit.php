<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblaudit
 *
 * @ORM\Table(name="tblaudit", indexes={@ORM\Index(name="UniqID", columns={"UniqID"})})
 * @ORM\Entity
 */
class Tblaudit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Audit_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $auditId;

    /**
     * @var string
     *
     * @ORM\Column(name="User", type="string", length=50, nullable=true)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="ComputerName", type="string", length=50, nullable=true)
     */
    private $computername;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateTime", type="datetime", nullable=true)
     */
    private $datetime;

    /**
     * @var string
     *
     * @ORM\Column(name="UniqID_Field", type="string", length=50, nullable=true)
     */
    private $uniqidField;

    /**
     * @var string
     *
     * @ORM\Column(name="UniqID", type="string", length=50, nullable=true)
     */
    private $uniqid;

    /**
     * @var string
     *
     * @ORM\Column(name="Form", type="string", length=50, nullable=true)
     */
    private $form;

    /**
     * @var string
     *
     * @ORM\Column(name="Field", type="string", length=50, nullable=true)
     */
    private $field;

    /**
     * @var string
     *
     * @ORM\Column(name="Prev_Value", type="string", length=50, nullable=true)
     */
    private $prevValue;

    /**
     * @var string
     *
     * @ORM\Column(name="New_Value", type="string", length=50, nullable=true)
     */
    private $newValue;

    /**
     * @var string
     *
     * @ORM\Column(name="Action", type="string", length=50, nullable=true)
     */
    private $action;

    /**
     * @var string
     *
     * @ORM\Column(name="Reason", type="string", length=255, nullable=true)
     */
    private $reason;

    /**
     * @var string
     *
     * @ORM\Column(name="DelValues", type="text", nullable=true)
     */
    private $delvalues;


}

