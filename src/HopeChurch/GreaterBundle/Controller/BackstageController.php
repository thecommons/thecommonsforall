<?php

namespace HopeChurch\GreaterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BackstageController extends Controller
{

  public function getOverallAttendeesAction($event, $date, $_route)
  {
    $repo = $this->getDoctrine()->getManager()
      ->getRepository('HopeChurchGreaterBundle:OverallAttendance');

    if($date) {
      $records = $repo->findOverallAttendeeCountForEventByDate($event, $date);
    } else {
      $records = $repo->findOverallAttendeeCountForEvent($event);
    }

    if(!$records)
      {
	// no attendees
	$records = Array();
      }

    $response = new Response(json_encode($records));
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }

  public function updateOverallAttendeesAction($_route)
  {
    $results = Array();
    $em = $this->getDoctrine()->getManager();
    $repo = $em->getRepository('HopeChurchGreaterBundle:OverallAttendance');

    $event = $this->get("request")->request->get("event");
    $date = $this->get("request")->request->get("date");
    $count = $this->get("request")->request->get("count");

    $results = $repo->updateOverallAttendeesForEventByDate($event,
							   $date, $count);

    $response = new Response(json_encode($results));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
  }

  public function getAttendeesAction($event, $role, $date, $_route)
  {
    /* this will eventually be a pretty complex formula for sorting
     * the list of "Person"s into most-common-first
     *
     * Thoughts on the algorithm...
     * - # times attended total
     * - median time between attendances
     * - time since last attendance
     *
     * Examples:
     * - Jon, attended 70 times, median time: 1 wk, time since last: 1 wk
     * - Person Y, attended 5 times, median time: 3 wk, time since last 2 wk
     */

    /* for now, just get the list of people and the number of times they
       have attended the sunday service */

    $repo = $this->getDoctrine()->getManager()
      ->getRepository('HopeChurchGreaterBundle:Attendance');

    if($date) {
      $records = $repo->findAllAttendeesForEventByDate($event, $date);
    } else if($role == "all") {
      $records = $repo->findAllAttendeesForEvent($event);
    } else {
      $records = $repo->findAllAttendeesForEventByRole($event, $role);
    }

    if(!$records)
      {
	//throw $this->
	// createNotFoundException("Could not get page $page of the potential "
	//			  ."attendee list.");

	// no attendees
	$records = Array();
      }

    $response = new Response(json_encode($records));
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }

  public function updateAttendeesAction($event, $date, $_route)
  {
    $results = Array();
    $em = $this->getDoctrine()->getManager();
    $attRepo = $em->getRepository('HopeChurchGreaterBundle:Attendance');

    $params = array();
    $add_attendees = $this->get("request")->request->get("add_attendees");
    $rm_attendees = $this->get("request")->request->get("rm_attendees");

    // first, remove attendance for those that have been removed
    $results[0] = $attRepo->removeAttendeesForEventByDate($event, $date,
							  $rm_attendees);

    // now, add attendance for those that have been added
    $results[1] = $attRepo->addAttendeesForEventByDate($event, $date,
						       $add_attendees);

    $response = new Response(json_encode($results));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
  }

  public function getMentorByDiscipleshipStageAction($dstage)
  {
    $results = Array();
    $em = $this->getDoctrine()->getManager();
    $dstageRepo = $em->getRepository('HopeChurchGreaterBundle:DiscipleshipStage');


    $results = $dstageRepo->findMentors($dstage);

    $response = new Response(json_encode($results));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
  }
}
