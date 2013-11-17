<?php

namespace HopeChurch\GreaterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BackstageController extends Controller
{

  private function arr2arr($array, $type)
  {
    $toArray = function($val)
    {
      return $val->toArray();
    };

    $toArrayBrief = function($val)
    {
      return $val->toArrayBrief();
    };

    if($type == "brief") {
      return array_map($toArrayBrief, $array);
    } else {
      return array_map($toArray, $array);
    }
  }

  public function getAction($type, $record_id, $_route)
    {
      // the default
      $json_data = array("error" => "unknown");

      /* they have asked us to return the json data for this type */

      /* at the moment we only support type == people */
      if($type == "person" || $type == "person-brief")
	{
	  if($record_id == "all")
	    {
	      // get all the people!
	      $result = $this->getDoctrine()
		->getRepository('HopeChurchGreaterBundle:Person')
		->findAll();

	      if (!$result) {
		throw $this->
		  createNotFoundException("No people found!");
	      }

              if($type == "person-brief") {
                $json_data = $this->arr2arr($result, "brief");
              } else {
	        $json_data = $this->arr2arr($result, "full");
              }
	    }
	  else
	    {
	      $result = $this->getDoctrine()
		->getRepository('HopeChurchGreaterBundle:Person')
		->find($record_id);

	      if (!$result) {
		throw $this->
		  createNotFoundException('No person found with id '.$record_id);
	      }

	      $json_data = $result->toArray();
	    }
	}
      //check for other types here
      else
	{
	  // error
	  throw $this->
	    createNotFoundException("Invalid get request type ($type)");
	}

      // by here we should have the json object ready
      $response = new Response(json_encode($json_data));
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

  public function updateAttendanceAction($type, $_route)
  {
    throw $this->createNotFoundException("Attendance update not implemented");
  }

  public function updatePersonAction($_route)
  {
    $person = new Person();

    throw $this->createNotFoundException("Person update not implemented");
  }

  public function getLeadersAction()
  {
    $em = $this->getDoctrine()->getManager();

    $records = $em->getRepository('HopeChurchGreaterBundle:Person')
	          ->findAllLeaders();

    if(!$records)
      {
	// no leaders
	$records = Array();
      }

    $response = new Response(json_encode($records));
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }

  public function getRolesPeopleAction()
  {
    $em = $this->getDoctrine()->getManager();

    $records = $em->getRepository('HopeChurchGreaterBundle:Role')
	          ->findAllPeople();

    if(!$records)
      {
	// no people for roles
	$records = Array();
      }

    $response = new Response(json_encode($records));
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }

}
