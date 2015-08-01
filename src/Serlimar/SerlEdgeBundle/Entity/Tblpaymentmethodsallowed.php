<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblpaymentmethodsallowed
 *
 * @ORM\Table(name="tblpaymentmethodsallowed", indexes={@ORM\Index(name="$Paymentmethod", columns={"PaymentmethodGUID"}), @ORM\Index(name="$Role", columns={"RoleID"})})
 * @ORM\Entity
 */
class Tblpaymentmethodsallowed
{
    /**
     * @var string
     *
     * @ORM\Column(name="GUID", type="string", length=40)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $guid = '';

    /**
     * @var string
     *
     * @ORM\Column(name="PaymentmethodGUID", type="string", length=40, nullable=true)
     */
    private $paymentmethodguid;

    /**
     * @var integer
     *
     * @ORM\Column(name="RoleID", type="integer", nullable=true)
     */
    private $roleid;


}

