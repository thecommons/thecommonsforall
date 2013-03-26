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
     * Set smallgroupId
     *
     * @param integer $smallgroupId
     * @return Family
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
     * @return Family
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
