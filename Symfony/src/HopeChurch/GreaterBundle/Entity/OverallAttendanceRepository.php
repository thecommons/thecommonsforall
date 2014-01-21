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
      ->getResult();
  }

}
