<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 */
class Event
{
    /**
     * @var string
     */
    private $eventName;

    /**
     * @var integer
     */
    private $id;

    /** 
     * @var ArrayCollection
     */
    private $attendees;

    public function __construct()
    {
      $this->attendees = new ArrayCollection();
    }

    /**
     * Set eventName
     *
     * @param string $eventName
     * @return Event
     */
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;
    
        return $this;
    }

    /**
     * Get eventName
     *
     * @return string 
     */
    public function getEventName()
    {
        return $this->eventName;
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
     * Add attendees
     *
     * @param \HopeChurch\GreaterBundle\Entity\Attendance $attendance
     * @return People
     */
    public function addAttendees(\HopeChurch\GreaterBundle\Entity\Attendance 
				$attendees)
    {
        $this->attendees[] = $attendees;
    
        return $this;
    }

    /**
     * Remove attendees
     *
     * @param \HopeChurch\GreaterBundle\Entity\Person $people
     */
    public function removeAttendees(\HopeChurch\GreaterBundle\Entity\Attendance 
				   $attendees)
    {
        $this->attendees->removeElement($attendees);
    }

    /**
     * Get attendees
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAttendees()
    {
        return $this->attendees;
    }
}