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
		    ." ORDER BY a_cnt DESC, a_latest DESC, "
		    ." p.nameFirst ASC, p.nameLast ASC")
      ->setParameter('event_id', $event_id)
      ->getResult();
  }

    public function findAttendeeCountForEvent($event_id)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT count(a.id) as attendeeCount, "
                . " a.date"
                . " FROM HopeChurchGreaterBundle:Attendance a"
                . " LEFT JOIN a.event e "
                . " WHERE e.id = :event_id"
                . " GROUP BY a.date")
            ->setParameter('event_id', $event_id)
            ->getResult();
    }

    public function findAttendeeCountForEventByDate($event_id, $date)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT count(a.id) as attendeeCount, "
                . " a.date"
                . " FROM HopeChurchGreaterBundle:Attendance a"
                . " LEFT JOIN a.event e "
                . " WHERE e.id = :event_id"
                . " AND a.date = :date"
                . " GROUP BY a.date")
            ->setParameter('event_id', $event_id)
            ->setParameter('date', $date)
            ->getResult();
    }

  public function findAllAttendeesForEventByRole($event_id, $role_name)
  {
    return $this->getEntityManager()
      ->createQuery("SELECT p.id as p_id, e.id as e_id, "
		    ." p.nameFirst, p.nameLast, "
		    ." count(a.id) as a_cnt, "
		    ." max(a.date) as a_latest "
		    ." FROM HopeChurchGreaterBundle:Person p "
		    ." INNER JOIN p.age r "
            ." INNER JOIN p.status s"
		    ." WITH r.name = :role_name "
		    ." LEFT JOIN p.attended a "
		    ." LEFT JOIN a.event e "
		    ." WHERE (e.id = :event_id OR e.id is NULL)"
            ." AND s.name = 'Active'"
		    ." GROUP BY p.id "
		    ." ORDER BY a_cnt DESC, a_latest DESC, "
		    ." p.nameFirst ASC, p.nameLast ASC")
      ->setParameter('role_name', $role_name)
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

  public function removeAttendeesForEventByDate($event_id, $date, $attendees)
  {
    $em = $this->getEntityManager();
    $to_rm = $em->createQuery("SELECT a "
			      ." FROM HopeChurchGreaterBundle:Attendance a "
			      ." JOIN a.person p "
			      ." JOIN a.event e "
			      ." WHERE e.id = :event_id "
			      ." AND a.date = :date "
			      ." AND p.id IN (:ids)")
      ->setParameter('event_id', $event_id)
      ->setParameter('date', $date)
      ->setParameter('ids', $attendees)
      ->getResult();

    foreach($to_rm as $att)
      {
	$em->remove($att);
      }

    $em->flush();

    return count($to_rm);
  }

  public function addAttendeesForEventByDate($event_id, $date, $attendees)
  {
    $em = $this->getEntityManager();

    // get this event
    $event = $em->createQuery("SELECT e "
			      ." FROM HopeChurchGreaterBundle:Event e "
			      ." WHERE e.id = :event_id")
      ->setParameter('event_id', $event_id)
      ->getSingleResult();

    // get entities for each attendee
    $persons = $em->createQuery("SELECT p "
				." FROM HopeChurchGreaterBundle:Person p "
				." WHERE p.id IN (:ids)")
      ->setParameter('ids', $attendees)
      ->getResult();

    //create an attendance for each person
    foreach($persons as $person)
      {
	$att = new Attendance;
	$att->setPerson($person);
	$att->setEvent($event);
	$att->setDate(new \DateTime($date));
	$em->persist($att);
      }

    $em->flush();

    return count($persons);
  }

}

?>
