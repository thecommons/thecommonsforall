<?php

namespace TheCommons\CommonFolkBundle\Entity;

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
     * @var Person
     */
    private $person;

    /**
     * @var Event
     */
    private $event;

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
     * Set person
     *
     * @param \TheCommons\CommonFolkBundle\Entity\Person $person
     * @return Attendance
     */
    public function setPerson(\TheCommons\CommonFolkBundle\Entity\Person $person)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return  \TheCommons\CommonFolkBundle\Entity\Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Set event
     *
     * @param \TheCommons\CommonFolkBundle\Entity\Event $event
     * @return Attendance
     */
    public function setEvent(\TheCommons\CommonFolkBundle\Entity\Event $event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get eventId
     *
     * @return \TheCommons\CommonFolkBundle\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
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