<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * OverallAttendanceRepository
 *
 */
class OverallAttendanceRepository extends EntityRepository
{

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
