<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Smallgroup
 */
class Smallgroup
{
  /**
   * @var string
   */
  private $name;

  /**
   * @var \DateTime
   */
  private $dateCreated;

  /**
   * @var \DateTime
   */
  private $meetTime;

  /**
   * @var string
   */
  private $meetLocation;

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
   * @var integer
   */
  private $leader;

  /**
   * @var integer
   */
  private $id;

  /**
   * @var ArrayCollection
   */
  private $families;

  /**
   * @var ArrayCollection
   */
  private $people;

  public function __construct()
  {
    $this->families = new ArrayCollection();
    $this->people = new ArrayCollection();
  }

  /**
   * Set name
   *
   * @param string $name
   * @return Smallgroup
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get name
   *
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set dateCreated
   *
   * @param \DateTime $dateCreated
   * @return Smallgroup
   */
  public function setDateCreated($dateCreated)
  {
    $this->dateCreated = $dateCreated;

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
   * Set meetTime
   *
   * @param \DateTime $meetTime
   * @return Smallgroup
   */
  public function setMeetTime($meetTime)
  {
    $this->meetTime = $meetTime;

    return $this;
  }

  /**
   * Get meetTime
   *
   * @return \DateTime
   */
  public function getMeetTime()
  {
    return $this->meetTime;
  }

  /**
   * Set meetLocation
   *
   * @param string $meetLocation
   * @return Smallgroup
   */
  public function setMeetLocation($meetLocation)
  {
    $this->meetLocation = $meetLocation;

    return $this;
  }

  /**
   * Get meetLocation
   *
   * @return string
   */
  public function getMeetLocation()
  {
    return $this->meetLocation;
  }

  /**
   * Set addrFirst
   *
   * @param string $addrFirst
   * @return Smallgroup
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
   * @return Smallgroup
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
   * @return Smallgroup
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
   * @return Smallgroup
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
   * @return Smallgroup
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
   * @return Smallgroup
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
   * Set leaderId
   *
   * @param integer $leaderId
   * @return Smallgroup
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
   * @return Smallgroup
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
   * Add people
   *
   * @param \HopeChurch\GreaterBundle\Entity\Person $person
   * @return Smallgroup
   */
  public function addPerson(\HopeChurch\GreaterBundle\Entity\Person $person)
  {
    $this->people->addElement($person);

    return $this;
  }

  /**
   * Remove person
   *
   * @param \HopeChurch\GreaterBundle\Entity\Person $person
   */
  public function removePerson(\HopeChurch\GreaterBundle\Entity\Person $person)
  {
    $this->people->removeElement($people);
  }

  /**
   * Get people
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getPeople()
  {
    return $this->people;
  }

  /**
   * Add family
   *
   * @param \HopeChurch\GreaterBundle\Entity\Family $family
   * @return Smallgroup
   */
  public function addFamily(\HopeChurch\GreaterBundle\Entity\Family $family)
  {
    $this->families->addElement($family);

    return $this;
  }

  /**
   * Remove families
   *
   * @param \HopeChurch\GreaterBundle\Entity\Family $family
   */
  public function removeFamily(\HopeChurch\GreaterBundle\Entity\Family $family)
  {
    $this->people->removeElement($family);
  }

  /**
   * Get families
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getFamilies()
  {
    return $this->families;
  }
}
