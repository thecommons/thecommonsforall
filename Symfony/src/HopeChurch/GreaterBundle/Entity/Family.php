<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Family
 */
class Family
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
     * @var integer
     */
    private $smallgroup;

    /**
     * @var integer
     */
    private $leader;

    /**
     * @var integer
     */
    private $id;

    private $people;

    public function __construct()
    {
      $this->people = new ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Family
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
     * @return Family
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
     * Set phoneCell
     *
     * @param string $phoneCell
     * @return Family
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
     * @return Family
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
     * @return Family
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
     * @return Family
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
     * @return Family
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
     * @return Family
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
     * @return Family
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
     * @return Family
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
     * @return Family
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
     * @param \HopeChurch\GreaterBundle\Entity\Person $people
     * @return Family
     */
    public function addPeople(\HopeChurch\GreaterBundle\Entity\Person $people)
    {
        $this->people[] = $people;
    
        return $this;
    }

    /**
     * Remove people
     *
     * @param \HopeChurch\GreaterBundle\Entity\Person $people
     */
    public function removePeople(\HopeChurch\GreaterBundle\Entity\Person $people)
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
     * Set smallgroup
     *
     * @param \HopeChurch\GreaterBundle\Entity\Smallgroup $smallgroup
     * @return Family
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
}