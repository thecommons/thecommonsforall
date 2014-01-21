<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * OverallAttendanceRepository
 *
 */
class OverallAttendanceRepository extends EntityRepository
{

  public function findOverallAttendeeCountForEvent($event_id)
  {
    return $this->getEntityManager()
      ->createQuery("SELECT a.attendeeCount, a.date"
		    ." FROM HopeChurchGreaterBundle:OverallAttendance a"
		    ." JOIN a.event e "
		    ." WHERE e.id = :event_id")
      ->setParameter('event_id', $event_id)
      ->getResult();
  }

  public function findOverallAttendeeCountForEventByDate($event_id, $date)
  {
    return $this->getEntityManager()
      ->createQuery("SELECT a.attendeeCount"
		    ." FROM HopeChurchGreaterBundle:OverallAttendance a"
		    ." JOIN a.event e "
		    ." WHERE e.id = :event_id"
		    ." AND a.date = :date")
      ->setParameter('event_id', $event_id)
      ->setParameter('date', $date)
      ->getSingleResult();
  }

  public function updateOverallAttendeesForEventByDate($event_id,
						       $date, $attendees)
  {
    $em = $this->getEntityManager();

    // get this event
    $event = $em->createQuery("SELECT e "
			      ." FROM HopeChurchGreaterBundle:Event e "
			      ." WHERE e.id = :event_id")
      ->setParameter('event_id', $event_id)
      ->getSingleResult();

    // try and get the attendance for this date
    $oa = $this->getEntityManager()
      ->createQuery("SELECT a"
		    ." FROM HopeChurchGreaterBundle:OverallAttendance a"
		    ." JOIN a.event e "
		    ." WHERE e.id = :event_id"
		    ." AND a.date = :date")
      ->setParameter('event_id', $event_id)
      ->setParameter('date', $date)
      ->getSingleResult();

    if(!$oa) {
      $oa = new OverallAttendance;
      $oa->setEvent($event);
      $oa->setDate(new \HopeChurch\GreaterBundle\Type\DbDate($date));
      $em->persist($oa); //only need to persist if it is new
    }

    // now update or set the attendance
    $oa->setAttendeeCount($attendees);

    $em->flush();

    return $attendees;
  }

}
