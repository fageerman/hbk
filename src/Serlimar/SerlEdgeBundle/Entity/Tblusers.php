<?php

namespace Serlimar\SerlEdgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Tblusers
 *
 * @ORM\Table(name="tblusers", indexes={
 * @ORM\Index(name="FirstName", columns={"FirstName"}), 
 * @ORM\Index(name="LastName", columns={"LastName"}), 
 * @ORM\Index(name="Username", columns={"Username"}), 
 * @ORM\Index(name="user_roles_fk", columns={"role_collection_id"})})
 * @ORM\Entity
 * @UniqueEntity(fields={"username"},message="This username already exists")
 */
class Tblusers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotNull(
     *      message="Enter the firstname of the user."
     * )
     * @ORM\Column(name="FirstName", type="string", length=25, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=25, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     * @Assert\NotNull(
     *      message="Enter a valid username"
     * )
     * @ORM\Column(name="Username", type="string", length=25, nullable=true)
     */
    private $username;
    
    
     /**
     * @var string
     * @Assert\Email()
     * @Assert\NotBlank()
     * @ORM\Column(name="email", type="string", length=40)
     */
    private $email;
    
    /**
     * 
     */
    private $plainPassword;
    /**
     * @var string
     * @ORM\Column(name="Password", type="string", length=254, nullable=true)
     */
    private $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="role_collection_id", type="integer", nullable=true)
     */
    private $role_collection_id;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=50, nullable=true)
     */
    private $salt;

    /**
     * @var integer
     *
     * @ORM\Column(name="userAccessLevel", type="integer", nullable=true)
     */
    private $useraccesslevel;

    /**
     * @var string
     *
     * @ORM\Column(name="Shortname", type="string", length=5, nullable=true)
     */
    private $shortname;

    /**
     * @var string
     *
     * @ORM\Column(name="Nota", type="text", nullable=true)
     */
    private $nota;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LoggedIN", type="datetime", nullable=true)
     */
    private $loggedin;

    /**
     * @var string
     *
     * @ORM\Column(name="ComputerName", type="string", length=50, nullable=true)
     */
    private $computername;

    /**
     * @var string
     *
     * @ORM\Column(name="Firma", type="string", length=50, nullable=true)
     */
    private $firma;

    /**
     * @var string
     *
     * @ORM\Column(name="Functie", type="string", length=25, nullable=true)
     */
    private $functie;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Kickout", type="boolean", nullable=true)
     */
    private $kickout = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="KickoutTime", type="integer", nullable=true)
     */
    private $kickouttime;

    /**
     * @var string
     *
     * @ORM\Column(name="KickoutMessage", type="string", length=255, nullable=true)
     */
    private $kickoutmessage;

    /**
     * @var string
     *
     * @ORM\Column(name="Memo", type="text", nullable=true)
     */
    private $memo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TimeStamp", type="datetime", nullable=true)
     */
    private $timestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UserActionDate", type="datetime", nullable=true)
     */
    private $useractiondate;

    /**
     * @var string
     *
     * @ORM\Column(name="Locked", type="string", length=50, nullable=true)
     */
    private $locked;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LockedDate", type="datetime", nullable=true)
     */
    private $lockeddate;

    /**
     * @var string
     *
     * @ORM\Column(name="LockedUserID", type="string", length=50, nullable=true)
     */
    private $lockeduserid;

    /**
     * @var string
     *
     * @ORM\Column(name="LockedUserName", type="string", length=150, nullable=true)
     */
    private $lockedusername;

    /**
     * @var boolean
     *
     * @ORM\Column(name="NotActive", type="boolean", nullable=true)
     */
    private $notactive = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="InsertUser", type="string", length=150, nullable=true)
     */
    private $insertuser;

    /**
     * @var string
     *
     * @ORM\Column(name="UserAction", type="string", length=150, nullable=true)
     */
    private $useraction;

    /**
     * @var string
     *
     * @ORM\Column(name="Location", type="string", length=50, nullable=true)
     */
    private $location;

    function getId() {
        return $this->id;
    }

    function getFirstname() {
    return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getRoleCollectionId() {
        return $this->role_collection_id;
    }

    function getSalt() {
        return $this->salt;
    }

    function getUseraccesslevel() {
        return $this->useraccesslevel;
    }

    function getShortname() {
        return $this->shortname;
    }
    
    function getEmail() {
        return $this->email;
    }

    
    function getNota() {
        return $this->nota;
    }

    function getLoggedin() {
        return $this->loggedin;
    }

    function getComputername() {
        return $this->computername;
    }

    function getFirma() {
        return $this->firma;
    }

    function getFunctie() {
        return $this->functie;
    }

    function getKickout() {
        return $this->kickout;
    }

    function getKickouttime() {
        return $this->kickouttime;
    }

    function getKickoutmessage() {
        return $this->kickoutmessage;
    }

    function getMemo() {
        return $this->memo;
    }

    function getTimestamp() {
        return $this->timestamp;
    }

    function getUseractiondate() {
        return $this->useractiondate;
    }

    function getLocked() {
        return $this->locked;
    }

    function getLockeddate() {
        return $this->lockeddate;
    }

    function getLockeduserid() {
        return $this->lockeduserid;
    }

    function getLockedusername() {
        return $this->lockedusername;
    }

    function getNotactive() {
        return $this->notactive;
    }

    function getInsertuser() {
        return $this->insertuser;
    }

    function getUseraction() {
        return $this->useraction;
    }

    function getLocation() {
        return $this->location;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function setUsername($username) {
        $this->username = $username;
    }
    
    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRoleCollectionId($roleCollectionId) {
        $this->role_collection_id = $roleCollectionId;
    }

    function setSalt($salt) {
        $this->salt = $salt;
    }

    function setUseraccesslevel($useraccesslevel) {
        $this->useraccesslevel = $useraccesslevel;
    }

    function setShortname($shortname) {
        $this->shortname = $shortname;
    }

    function setNota($nota) {
        $this->nota = $nota;
    }

    function setLoggedin(\DateTime $loggedin) {
        $this->loggedin = $loggedin;
    }

    function setComputername($computername) {
        $this->computername = $computername;
    }

    function setFirma($firma) {
        $this->firma = $firma;
    }

    function setFunctie($functie) {
        $this->functie = $functie;
    }

    function setKickout($kickout) {
        $this->kickout = $kickout;
    }

    function setKickouttime($kickouttime) {
        $this->kickouttime = $kickouttime;
    }

    function setKickoutmessage($kickoutmessage) {
        $this->kickoutmessage = $kickoutmessage;
    }

    function setMemo($memo) {
        $this->memo = $memo;
    }

    function setTimestamp(\DateTime $timestamp) {
        $this->timestamp = $timestamp;
    }

    function setUseractiondate(\DateTime $useractiondate) {
        $this->useractiondate = $useractiondate;
    }

    function setLocked($locked) {
        $this->locked = $locked;
    }

    function setLockeddate(\DateTime $lockeddate) {
        $this->lockeddate = $lockeddate;
    }

    function setLockeduserid($lockeduserid) {
        $this->lockeduserid = $lockeduserid;
    }

    function setLockedusername($lockedusername) {
        $this->lockedusername = $lockedusername;
    }

    function setNotactive($notactive) {
        $this->notactive = $notactive;
    }

    function setInsertuser($insertuser) {
        $this->insertuser = $insertuser;
    }

    function setUseraction($useraction) {
        $this->useraction = $useraction;
    }

    function setLocation($location) {
        $this->location = $location;
    }

    function getPlainPassword() {
        return $this->plainPassword;
    }

    function setPlainPassword($plainPassword) {
        $this->plainPassword = $plainPassword;
    }
}

