<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RefInvoicestatus
 *
 * @ORM\Table(name="ref_invoicestatus")
 * @ORM\Entity
 */
class RefInvoicestatus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="InvoiceStatusID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $invoicestatusid;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=50, nullable=true)
     */
    private $status;


}

