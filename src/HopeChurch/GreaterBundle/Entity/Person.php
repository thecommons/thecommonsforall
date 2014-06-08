<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

/**
 * Person
 */
class Person
{
  /**
   * @var string
   */
  private $nameFirst;

  /**
   * @var string
   */
  private $nameLast;

  /**
   * @var string
   */
  private $notes;

  /**
   * @var Referrer
   */
  private $referrer;

  /**
   * @var \DateTime
   */
  private $dateCreated;

  /**
   * @var string
   */
  private $email;

  /**
   * @var string
   */
  private $phoneCell;

  /**
   * @var string
   */
  private $phoneHome;

  /**
   * @var string
   */
  private $addrFirst;

  /**
   * @var string
   */
  private $addrSecond;

  /**
   * @var string
   */
  private $addrCity;

  /**
   * @var string
   */
  private $addrState;

  /**
   * @var string
   */
  private $addrZip;

  /**
   * @var string
   */
  private $addrCountry;

  /**
   * @var boolean
   */
  private $facebook;

  /**
   * @var boolean
   */
  private $baptized;

  /**
   * @var Family
   */
  private $family;

  /**
   * @var Smallgroup
   */
  private $smallgroup;

  /**
   * @var Person
   */
  private $mentor;

  /**
   * @var Age
   */
  private $age;

  /**
   * @var PersonStatus
   */
  private $status;

  /**
   * @var DiscipleshipStage
   */
  private $discipleshipStage;

  /**
   * @var ArrayCollection
   */
  private $attended;

  /**
   * @var ArrayCollection
   */
  private $roles;

  /**
   * @var integer
   */
  private $id;

  /**
   * Set nameFirst
   *
   * @param string $nameFirst
   * @return Person
   */
  public function setNameFirst($nameFirst)
  {
    $this->nameFirst = $nameFirst;

    return $this;
  }

  /**
   * Get nameFirst
   *
   * @return string
   */
  public function getNameFirst()
  {
    return $this->nameFirst;
  }

  /**
   * Set nameLast
   *
   * @param string $nameLast
   * @return Person
   */
  public function setNameLast($nameLast)
  {
    $this->nameLast = $nameLast;

    return $this;
  }

  /**
   * Get nameLast
   *
   * @return string
   */
  public function getNameLast()
  {
    return $this->nameLast;
  }

  /**
   * Set notes
   *
   * @param string $notes
   * @return Person
   */
  public function setNotes($notes)
  {
    $this->notes = $notes;

    return $this;
  }

  /**
   * Get notes
   *
   * @return string
   */
  public function getNotes()
  {
    return $this->notes;
  }

  /**
   * Set referrer 
   *
   * @param \HopeChurch\GreaterBundle\Entity\Referrer $referrer
   * @return Referrer
   */
  public function setReferrer(\HopeChurch\GreaterBundle\Entity\Referrer $referrer= null)
  {
    $this->referrer = $referrer;

    return $this;
  }

  /**
   * Get referrer 
   *
   * @return \HopeChurch\GreaterBundle\Entity\Referrer
   */
  public function getReferrer()
  {
    return $this->referrer;
  }

  /**
   * Set dateCreated
   *
   * @param \DateTime $dateCreated
   * @return Person
   */
  public function setDateCreated($dateCreated)
  {
    $this->dateCreated = $dateCreated;

    return $this;
  }

  /**
   * Set dateCreatedValue
   *
   * @return Person
   */
  public function setDateCreatedValue()
  {
    $this->dateCreated = new \DateTime();

    return $this;
  }

  /**
   * Get dateCreated
   *
   * @return \DateTime
   */
  public function getDateCreated()
  {
    return $this->dateCreated;
  }

  /**
   * Set email
   *
   * @param string $email
   * @return Person
   */
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get email
   *
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set phoneCell
   *
   * @param string $phoneCell
   * @return Person
   */
  public function setPhoneCell($phoneCell)
  {
    $this->phoneCell = $phoneCell;

    return $this;
  }

  /**
   * Get phoneCell
   *
   * @return string
   */
  public function getPhoneCell()
  {
    return $this->phoneCell;
  }

  /**
   * Set phoneHome
   *
   * @param string $phoneHome
   * @return Person
   */
  public function setPhoneHome($phoneHome)
  {
    $this->phoneHome = $phoneHome;

    return $this;
  }

  /**
   * Get phoneHome
   *
   * @return string
   */
  public function getPhoneHome()
  {
    return $this->phoneHome;
  }

  /**
   * Set addrFirst
   *
   * @param string $addrFirst
   * @return Person
   */
  public function setAddrFirst($addrFirst)
  {
    $this->addrFirst = $addrFirst;

    return $this;
  }

  /**
   * Get addrFirst
   *
   * @return string
   */
  public function getAddrFirst()
  {
    return $this->addrFirst;
  }

  /**
   * Set addrSecond
   *
   * @param string $addrSecond
   * @return Person
   */
  public function setAddrSecond($addrSecond)
  {
    $this->addrSecond = $addrSecond;

    return $this;
  }

  /**
   * Get addrSecond
   *
   * @return string
   */
  public function getAddrSecond()
  {
    return $this->addrSecond;
  }

  /**
   * Set addrCity
   *
   * @param string $addrCity
   * @return Person
   */
  public function setAddrCity($addrCity)
  {
    $this->addrCity = $addrCity;

    return $this;
  }

  /**
   * Get addrCity
   *
   * @return string
   */
  public function getAddrCity()
  {
    return $this->addrCity;
  }

  /**
   * Set addrState
   *
   * @param string $addrState
   * @return Person
   */
  public function setAddrState($addrState)
  {
    $this->addrState = $addrState;

    return $this;
  }

  /**
   * Get addrState
   *
   * @return string
   */
  public function getAddrState()
  {
    return $this->addrState;
  }

  /**
   * Set addrZip
   *
   * @param string $addrZip
   * @return Person
   */
  public function setAddrZip($addrZip)
  {
    $this->addrZip = $addrZip;

    return $this;
  }

  /**
   * Get addrZip
   *
   * @return string
   */
  public function getAddrZip()
  {
    return $this->addrZip;
  }

  /**
   * Set addrCountry
   *
   * @param string $addrCountry
   * @return Person
   */
  public function setAddrCountry($addrCountry)
  {
    $this->addrCountry = $addrCountry;

    return $this;
  }

  /**
   * Get addrCountry
   *
   * @return string
   */
  public function getAddrCountry()
  {
    return $this->addrCountry;
  }

  /**
   * Set facebook
   *
   * @param boolean $facebook
   * @return Person
   */
  public function setFacebook($facebook)
  {
    $this->facebook = $facebook;

    return $this;
  }

  /**
   * Get facebook
   *
   * @return boolean
   */
  public function getFacebook()
  {
    return $this->facebook;
  }

  /**
   * Set baptized
   *
   * @param boolean $baptized
   * @return Person
   */
  public function setBaptized($baptized)
  {
    $this->baptized = $baptized;

    return $this;
  }

  /**
   * Get baptized
   *
   * @return boolean
   */
  public function getBaptized()
  {
    return $this->baptized;
  }

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
   * Set mentor
   *
   * @param \HopeChurch\GreaterBundle\Entity\Person $mentor
   * @return Person
   */
  public function setMentor(\HopeChurch\GreaterBundle\Entity\Person $mentor = null)
  {
    $this->mentor = $mentor;

    return $this;
  }

  /**
   * Get mentor
   *
   * @return \HopeChurch\GreaterBundle\Entity\Person
   */
  public function getMentor()
  {
    return $this->mentor;
  }

  /**
   * Set age
   *
   * @param \HopeChurch\GreaterBundle\Entity\Age $age
   * @return Person
   */
  public function setAge(\HopeChurch\GreaterBundle\Entity\Age $age = null)
  {
    $this->age = $age;

    return $this;
  }

  /**
   * Get age
   *
   * @return \HopeChurch\GreaterBundle\Entity\Age
   */
  public function getAge()
  {
    return $this->age;
  }

  /**
   * Set status
   *
   * @param \HopeChurch\GreaterBundle\Entity\PersonStatus $status
   * @return Person
   */
  public function setStatus(\HopeChurch\GreaterBundle\Entity\PersonStatus $status = null)
  {
    $this->status = $status;

    return $this;
  }

  /**
   * Get status
   *
   * @return \HopeChurch\GreaterBundle\Entity\PersonStatus
   */
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * Set discipleshipStage
   *
   * @param \HopeChurch\GreaterBundle\Entity\DiscipleshipStage $discipleshipStage
   * @return Person
   */
  public function setDiscipleshipStage(\HopeChurch\GreaterBundle\Entity\DiscipleshipStage $discipleshipStage = null)
  {
    $this->discipleshipStage = $discipleshipStage;

    return $this;
  }

  /**
   * Get discipleshipStage
   *
   * @return \HopeChurch\GreaterBundle\Entity\DiscipleshipStage
   */
  public function getDiscipleshipStage()
  {
    return $this->discipleshipStage;
  }

  /**
   * Set family
   *
   * @param \HopeChurch\GreaterBundle\Entity\Family $family
   * @return Person
   */
  public function setFamily(\HopeChurch\GreaterBundle\Entity\Family $family = null)
  {
    $this->family = $family;

    return $this;
  }

  /**
   * Get family
   *
   * @return \HopeChurch\GreaterBundle\Entity\Family
   */
  public function getFamily()
  {
    return $this->family;
  }

  /**
   * Set smallgroup
   *
   * @param \HopeChurch\GreaterBundle\Entity\Smallgroup $smallgroup
   * @return Person
   */
  public function setSmallgroup(\HopeChurch\GreaterBundle\Entity\Smallgroup $smallgroup = null)
  {
    $this->smallgroup = $smallgroup;

    return $this;
  }

  /**
   * Get smallgroup
   *
   * @return \HopeChurch\GreaterBundle\Entity\Smallgroup
   */
  public function getSmallgroup()
  {
    return $this->smallgroup;
  }

  /**
   * Add attended
   *
   * @param \HopeChurch\GreaterBundle\Entity\Attendance $attendance
   * @return People
   */
  public function addAttended(\HopeChurch\GreaterBundle\Entity\Attendance
			      $attended)
  {
    $this->attended[] = $attended;

    return $this;
  }

  /**
   * Remove attended
   *
   * @param \HopeChurch\GreaterBundle\Entity\Person $people
   */
  public function removeAttended(\HopeChurch\GreaterBundle\Entity\Attendance
				 $attended)
  {
    $this->attended->removeElement($attended);
  }

  /**
   * Get attended
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getAttended()
  {
    return $this->attended;
  }

  /**
   * Add role
   *
   * @param \HopeChurch\GreaterBundle\Entity\Role $role
   * @return Smallgroup
   */
  public function addRole(\HopeChurch\GreaterBundle\Entity\Role $role)
  {
    $this->roles->addElement($role);

    return $this;
  }

  /**
   * Remove role
   *
   * @param \HopeChurch\GreaterBundle\Entity\Role $role
   */
  public function removeRole(\HopeChurch\GreaterBundle\Entity\Role $role)
  {
    $this->roles->removeElement($role);
  }

  /**
   * Get roles
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getRoles()
  {
    return $this->roles;
  }

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->attended = new ArrayCollection();
    $this->roles = new ArrayCollection();
  }

  public function __toString()
  {
    return $this->getNameFirst()." ".$this->getNameLast();
  }

}