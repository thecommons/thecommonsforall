<?php

namespace TheCommons\CommonFolkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OverallAttendance
 */
class OverallAttendance
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \TheCommons\CommonFolkBundle\Type\DbDate
     */
    private $date;

    /**
     * @var Event
     */
    private $event;

    /**
     * @var integer
     */
    private $attendeeCount;


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
     * Set date
     *
     * @param \TheCommons\CommonFolkBundle\Type\DbDate $date
     * @return OverallAttendance
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \TheCommons\CommonFolkBundle\Type\DbDate
     */
    public function getDate()
    {
        return $this->date;
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
     * Set attendeeCount
     *
     * @param integer $attendeeCount
     * @return OverallAttendance
     */
    public function setAttendeeCount($attendeeCount)
    {
        $this->attendeeCount = $attendeeCount;

        return $this;
    }

    /**
     * Get attendeeCount
     *
     * @return integer
     */
    public function getAttendeeCount()
    {
        return $this->attendeeCount;
    }
}
