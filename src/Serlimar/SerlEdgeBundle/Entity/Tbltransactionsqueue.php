<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Serlimar\SerlEdgeBundle\Constraints as SerlAssert;
/**
 * Tbltransactionsqueue
 *
 * @ORM\Table(name="tbltransactionsqueue", indexes={@ORM\Index(name="Date_index", columns={"TransactionDate"}), @ORM\Index(name="CustomerID_index", columns={"CustomerID", "CustomerGUID"}), @ORM\Index(name="Method_index", columns={"TransactionMethodGUID", "LocationMethodGUID"})})
 * @ORM\Entity
 */
class Tbltransactionsqueue
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="GUID", type="guid", length=40, nullable=false)
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $guid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionDate", type="datetime", nullable=true)
     */
    private $transactiondate;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionMethodGUID", type="string", length=40, nullable=true)
     */
    private $transactionmethodguid;

    /**
     * @var integer
     *
     * @ORM\Column(name="CustomerID", type="integer", nullable=true)
     * @Assert\NotBlank(
     *      message="Enter a valid customer nr."
     * )
     * @SerlAssert\CustomerExists
     */
    private $customerid;

    /**
     * @var integer
     *
     * @ORM\Column(name="CustomerID_Original", type="integer", nullable=true)
     */
    private $customeridOriginal;

    /**
     * @var string
     * @ORM\Column(name="CustomerGUID", type="string", length=40, nullable=true)
     */
    private $customerguid;

    /**
     * @var string
     *
     * @ORM\Column(name="Customer", type="string", length=150, nullable=true)
     */
    private $customer;

    /**
     * @var string
     *
     * @ORM\Column(name="Customer_Original", type="string", length=150, nullable=true)
     */
    private $customerOriginal;

    /**
     * @var string
     *
     * @ORM\Column(name="Address", type="string", length=150, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="Address_Original", type="string", length=150, nullable=true)
     */
    private $addressOriginal;

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="string", length=150, nullable=true)
     */
    private $note;

    /**
     * @var string
     * @Assert\NotNull(
     *     message="Enter a valid invoice nr.",
     *     groups={"invoice"},
     *      )
     * @Assert\Length(
     *   min= 1,
     *   max= 11,
     *      minMessage="Enter a valid invoice nr.",
     *      maxMessage="Enter a valid invoice nr.",
     *      groups={"invoice"},
     * )
     * @SerlAssert\InvoiceExists(
     *      groups={"invoice"}
     * )
     * @ORM\Column(name="Reference", type="string", length=25, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="Reference_Original", type="string", length=25, nullable=true)
     */
    private $referenceOriginal;

    /**
     * @var float
     * @Assert\NotNull(
     *     message="Enter a valid amount."
     * )
     * @Assert\Regex(
     *     pattern="/^\d+(\.([0-9]){1,2})?$/",
     *     message="Enter a valid amount.."
     * )
     * @ORM\Column(name="Amount", type="float", precision=10, scale=0, nullable=true)
     */
    private $amount;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Verified", type="boolean", nullable=true)
     */
    private $verified = 0;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Skip", type="boolean", nullable=true)
     */
    private $skip = 0;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Executed", type="boolean", nullable=true)
     */
    private $executed = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ExecutedDate", type="datetime", nullable=true)
     */
    private $executeddate;

    /**
     * @var integer
     *
     * @ORM\Column(name="Contracts", type="integer", nullable=true)
     */
    private $contracts;

    /**
     * @var string
     *
     * @ORM\Column(name="Message", type="string", length=50, nullable=true)
     */
    private $message;

    /**
     * @var string
     * @Assert\NotBlank(
     *  message="Choose a transaction method."
     * )
     * @ORM\Column(name="LocationMethodGUID", type="string", length=40, nullable=true)
     */
    private $locationmethodguid;

    /**
     * @var string
     *
     * @ORM\Column(name="Location", type="string", length=50, nullable=true)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="LocationGUID", type="string", length=40, nullable=true)
     */
    private $locationguid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="VoidDate", type="datetime", nullable=true)
     */
    private $voiddate;

    /**
     * @var string
     *
     * @ORM\Column(name="VoidBy", type="string", length=100, nullable=true)
     */
    private $voidby;

    /**
     * @var string
     *
     * @ORM\Column(name="StatusGUID", type="string", length=40, nullable=true)
     */
    private $statusguid;

    /**
     * @var string
     *
     * @ORM\Column(name="InsertUser", type="string", length=150, nullable=true)
     */
    private $insertuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TimeStamp", type="datetime", nullable=true)
     */
    private $timestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UserActionDate", type="datetime", nullable=true)
     */
    private $useractiondate;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=150, nullable=true)
     */
    private $username;
    
    private $em;
    
    function getId() {
        return $this->id;
    }

    function getGuid() {
        return $this->guid;
    }

    function getTransactiondate() {
        return $this->transactiondate;
    }

    function getTransactionmethodguid() {
        return $this->transactionmethodguid;
    }

    function getCustomerid() {
        return $this->customerid;
    }

    function getCustomeridOriginal() {
        return $this->customeridOriginal;
    }

    function getCustomerguid() {
        return $this->customerguid;
    }

    function getCustomer() {
        return $this->customer;
    }

    function getCustomerOriginal() {
        return $this->customerOriginal;
    }

    function getAddress() {
        return $this->address;
    }

    function getAddressOriginal() {
        return $this->addressOriginal;
    }

    function getNote() {
        return $this->note;
    }

    function getReference() {
        return $this->reference;
    }

    function getReferenceOriginal() {
        return $this->referenceOriginal;
    }

    function getAmount() {
        return $this->amount;
    }

    function getVerified() {
        return $this->verified;
    }

    function getSkip() {
        return $this->skip;
    }

    function getExecuted() {
        return $this->executed;
    }

    function getExecuteddate() {
        return $this->executeddate;
    }

    function getContracts() {
        return $this->contracts;
    }

    function getMessage() {
        return $this->message;
    }

    function getLocationmethodguid() {
        return $this->locationmethodguid;
    }

    function getLocation() {
        return $this->location;
    }

    function getLocationguid() {
        return $this->locationguid;
    }

    function getVoiddate() {
        return $this->voiddate;
    }

    function getVoidby() {
        return $this->voidby;
    }

    function getStatusguid() {
        return $this->statusguid;
    }

    function getInsertuser() {
        return $this->insertuser;
    }

    function getTimestamp() {
        return $this->timestamp;
    }

    function getUseractiondate() {
        return $this->useractiondate;
    }

    function getUsername() {
        return $this->username;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setGuid($guid) {
        $this->guid = $guid;
    }

    function setTransactiondate(\DateTime $transactiondate) {
        $this->transactiondate = $transactiondate;
    }

    function setTransactionmethodguid($transactionmethodguid) {
        $this->transactionmethodguid = $transactionmethodguid;
    }

    function setCustomerid($customerid) {
        $this->customerid = $customerid;
    }

    function setCustomeridOriginal($customeridOriginal) {
        $this->customeridOriginal = $customeridOriginal;
    }

    function setCustomerguid($customerguid) {
        $this->customerguid = $customerguid;
    }

    function setCustomer($customer) {
        $this->customer = $customer;
    }

    function setCustomerOriginal($customerOriginal) {
        $this->customerOriginal = $customerOriginal;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setAddressOriginal($addressOriginal) {
        $this->addressOriginal = $addressOriginal;
    }

    function setNote($note) {
        $this->note = $note;
    }

    function setReference($reference) {
        $this->reference = $reference;
    }

    function setReferenceOriginal($referenceOriginal) {
        $this->referenceOriginal = $referenceOriginal;
    }

    function setAmount($amount) {
        $this->amount = $amount;
    }

    function setVerified($verified) {
        $this->verified = $verified;
    }

    function setSkip($skip) {
        $this->skip = $skip;
    }

    function setExecuted($executed) {
        $this->executed = $executed;
    }

    function setExecuteddate(\DateTime $executeddate) {
        $this->executeddate = $executeddate;
    }

    function setContracts($contracts) {
        $this->contracts = $contracts;
    }

    function setMessage($message) {
        $this->message = $message;
    }

    function setLocationmethodguid($locationmethodguid) {
        $this->locationmethodguid = $locationmethodguid;
    }

    function setLocation($location) {
        $this->location = $location;
    }

    function setLocationguid($locationguid) {
        $this->locationguid = $locationguid;
    }

    function setVoiddate(\DateTime $voiddate) {
        $this->voiddate = $voiddate;
    }

    function setVoidby($voidby) {
        $this->voidby = $voidby;
    }

    function setStatusguid($statusguid) {
        $this->statusguid = $statusguid;
    }

    function setInsertuser($insertuser) {
        $this->insertuser = $insertuser;
    }

    function setTimestamp(\DateTime $timestamp) {
        $this->timestamp = $timestamp;
    }

    function setUseractiondate(\DateTime $useractiondate) {
        $this->useractiondate = $useractiondate;
    }

    function setUsername($username) {
        $this->username = $username;
    }
    
//    /**
//     * @Assert\Callback
//     */
//    public function validate(ExecutionContextInterface $context)
//    {
//       
//        $context->buildViolation('This name sounds totally fake!')
//            ->atPath('customerid')
//            ->addViolation();
//
//    }
}

