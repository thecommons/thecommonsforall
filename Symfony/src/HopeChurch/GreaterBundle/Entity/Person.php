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
   * @var Family
   */
  private $family;

  /**
   * @var Smallgroup
   */
  private $smallgroup;

  /**
   * @var Leader
   */
  private $leader;

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

  /** Convert object to array
   *
   * @return Array
   */
  public function toArray()
  {
    $dc = ($this->getDateCreated()) ?
      $this->getDateCreated()->getTimestamp() :
      0;
    return array(
		 'nameFirst' => $this->getNameFirst(),
		 'nameLast' => $this->getNameLast(),
		 'notes' => $this->getNotes(),
		 'dateCreated' => $dc,
		 'email' => $this->getEmail(),
		 'phoneCell' => $this->getPhoneCell(),
		 'phoneHome' => $this->getPhoneHome(),
		 'addrFirst' => $this->getAddrFirst(),
		 'addrSecond' => $this->getAddrSecond(),
		 'addrCity' => $this->getAddrCity(),
		 'addrState' => $this->getAddrState(),
		 'addrZip' => $this->getAddrZip(),
		 'addrCountry' => $this->getAddrCountry(),
		 'family' => $this->getFamily(),
		 'smallgroup' => $this->getSmallgroup(),
		 'leader' => $this->getLeader(),
		 'id' => $this->getId()
		 );
  }

  /** Convert object to array
   * but only include First and Last name
   *
   * @return Array
   */
  public function toArrayBrief()
  {
    return array(
		 'nameFull' => $this->getNameFirst() . " " . $this->getNameLast(),
		 'nameFirst' => $this->getNameFirst(),
		 'nameLast' => $this->getNameLast(),
		 'id' => $this->getId()
		 );
  }

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
   * Get id
   *
   * @return integer
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set leader
   *
   * @param \HopeChurch\GreaterBundle\Entity\Person $leader
   * @return Person
   */
  public function setLeader(\HopeChurch\GreaterBundle\Entity\Person $leader = null)
  {
    $this->leader = $leader;

    return $this;
  }

  /**
   * Get leader
   *
   * @return \HopeChurch\GreaterBundle\Entity\Person
   */
  public function getLeader()
  {
    return $this->leader;
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
   * @var integer
   */
  private $leaderId;

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->attended = new ArrayCollection();
    $this->roles = new ArrayCollection();
  }

  /**
   * Set leaderId
   *
   * @param integer $leaderId
   * @return Person
   */
  public function setLeaderId($leaderId)
  {
    $this->leaderId = $leaderId;

    return $this;
  }

  /**
   * Get leaderId
   *
   * @return integer
   */
  public function getLeaderId()
  {
    return $this->leaderId;
  }

  public function __toString()
  {
    return $this->getNameFirst()." ".$this->getNameLast();
  }

  public static function loadValidatorMetadata(ClassMetadata $metadata)
  {
    $metadata->addPropertyConstraint('nameFirst', new NotBlank());
  }
}
