<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var boolean
     */
    private $facebook;

    /**
     * @var integer
     */
    private $familyId;

    /**
     * @var integer
     */
    private $smallgroupId;

    /**
     * @var integer
     */
    private $leaderId;

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
     * Set familyId
     *
     * @param integer $familyId
     * @return Person
     */
    public function setFamilyId($familyId)
    {
        $this->familyId = $familyId;
    
        return $this;
    }

    /**
     * Get familyId
     *
     * @return integer 
     */
    public function getFamilyId()
    {
        return $this->familyId;
    }

    /**
     * Set smallgroupId
     *
     * @param integer $smallgroupId
     * @return Person
     */
    public function setSmallgroupId($smallgroupId)
    {
        $this->smallgroupId = $smallgroupId;
    
        return $this;
    }

    /**
     * Get smallgroupId
     *
     * @return integer 
     */
    public function getSmallgroupId()
    {
        return $this->smallgroupId;
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

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
