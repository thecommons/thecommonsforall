<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attendance
 */
class Attendance
{
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var integer
     */
    private $personId;

    /**
     * @var integer
     */
    private $eventId;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Attendance
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
     * Set personId
     *
     * @param integer $personId
     * @return Attendance
     */
    public function setPersonId($personId)
    {
        $this->personId = $personId;
    
        return $this;
    }

    /**
     * Get personId
     *
     * @return integer 
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * Set eventId
     *
     * @param integer $eventId
     * @return Attendance
     */
    public function setEventId($eventId)
    {
        $this->eventId = $eventId;
    
        return $this;
    }

    /**
     * Get eventId
     *
     * @return integer 
     */
    public function getEventId()
    {
        return $this->eventId;
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
