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
}
