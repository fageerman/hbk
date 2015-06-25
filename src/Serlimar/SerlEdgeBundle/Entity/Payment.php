<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Serlimar\SerlEdgeBundle\Entity\PaymentRepository")
 */
class Payment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var integer
     *
     * @ORM\Column(name="customerID", type="integer")
     */
    private $customerID;

    /**
     * @var integer
     *
     * @ORM\Column(name="invoiceID", type="integer")
     */
    private $invoiceID;

    /**
     * @var string
     *
     * @ORM\Column(name="method_payment", type="string", length=45)
     */
    private $methodPayment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text")
     */
    private $note;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set iD
     *
     * @param integer $iD
     *
     * @return Payment
     */
    public function setID($iD)
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * Set customerID
     *
     * @param integer $customerID
     *
     * @return Payment
     */
    public function setCustomerID($customerID)
    {
        $this->customerID = $customerID;

        return $this;
    }

    /**
     * Get customerID
     *
     * @return integer
     */
    public function getCustomerID()
    {
        return $this->customerID;
    }

    /**
     * Set invoiceID
     *
     * @param integer $invoiceID
     *
     * @return Payment
     */
    public function setInvoiceID($invoiceID)
    {
        $this->invoiceID = $invoiceID;

        return $this;
    }

    /**
     * Get invoiceID
     *
     * @return integer
     */
    public function getInvoiceID()
    {
        return $this->invoiceID;
    }

    /**
     * Set methodPayment
     *
     * @param string $methodPayment
     *
     * @return Payment
     */
    public function setMethodPayment($methodPayment)
    {
        $this->methodPayment = $methodPayment;

        return $this;
    }

    /**
     * Get methodPayment
     *
     * @return string
     */
    public function getMethodPayment()
    {
        return $this->methodPayment;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Payment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return Payment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Payment
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }
}

