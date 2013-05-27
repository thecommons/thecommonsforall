<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AttendanceRepository extends EntityRepository
{
  public function findAllAttendeesForEvent($event_id)
  {
    return $this->getEntityManager()
	        ->createQuery("SELECT p.id as p_id, e.id as e_id, "
			     ." p.nameFirst, p.nameLast, "
			     ." count(a.id) as a_cnt, "
			     ." max(a.date) as a_latest "
			     ." FROM HopeChurchGreaterBundle:Person p"
                             ." LEFT JOIN p.attended a "
			     ." LEFT JOIN a.event e "
                             ." WHERE e.id = :event_id OR e.id is NULL"
			     ." GROUP BY p.id "
			     ." ORDER BY a_cnt DESC, a_latest DESC, p.nameFirst ASC, p.nameLast ASC")
	        ->setParameter('event_id', $event_id)
	        ->getResult();
  }

  public function findAllAttendeesForEventByDate($event_id, $date)
  {
    return $this->getEntityManager()
	        ->createQuery("SELECT p.id as p_id "
			     ." FROM HopeChurchGreaterBundle:Attendance a "
			     ." JOIN a.person p "
			     ." JOIN a.event e "
			     ." WHERE e.id = :event_id "
			     ." AND a.date = :date")
	        ->setParameter('event_id', $event_id)
	        ->setParameter('date', $date)
	        ->getResult();
  }
}

?>
