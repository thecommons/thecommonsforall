<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Age
 */
class Age
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $lower;

    /**
     * @var integer
     */
    private $upper;

    public function getFullName()
    {
      $rangeStr = "";
      if(strlen($this->getLower()) && strlen($this->getUpper())) {
	// (13-17)
	$rangeStr = " (".$this->getLower()."-".$this->getUpper().")";
      } else if(strlen($this->getLower())) {
	// (18+)
	$rangeStr = " (".$this->getLower()."+)";
      } else if(strlen($this->getUpper())) {
	// (< 3)
	$rangeStr = " (< ".$this->getUpper().")";
      }
      // else, leave blank

      return $this->getName().$rangeStr;
    }

    public function __toString()
    {
      return $this->getFullName();
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
     * Set name
     *
     * @param string $name
     * @return Age
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
     * Set lower
     *
     * @param integer $lower
     * @return Age
     */
    public function setLower($lower)
    {
        $this->lower = $lower;
    
        return $this;
    }

    /**
     * Get lower
     *
     * @return integer 
     */
    public function getLower()
    {
        return $this->lower;
    }

    /**
     * Set upper
     *
     * @param integer $upper
     * @return Age
     */
    public function setUpper($upper)
    {
        $this->upper = $upper;
    
        return $this;
    }

    /**
     * Get upper
     *
     * @return integer 
     */
    public function getUpper()
    {
        return $this->upper;
    }
}
