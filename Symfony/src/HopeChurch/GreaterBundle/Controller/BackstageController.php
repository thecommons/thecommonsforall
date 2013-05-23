<?php

namespace HopeChurch\GreaterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BackstageController extends Controller
{

  private function arr2arr($array)
  {
    $toArray = function($val)
      {
	return $val->toArray();
      };

    return array_map($toArray, $array);
  }

  public function getAction($type, $record_id, $_route)
    {
      // the default
      $json_data = array("error" => "unknown");

      /* they have asked us to return the json data for this type */

      /* at the moment we only support type == people */
      if($type == "person")
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

	      $json_data = $this->arr2arr($result);
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

  public function getAttendeesAction($event, $date, $_route)
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
    
    $em = $this->getDoctrine()->getManager();

    if($date) {
      $records = $em->getRepository('HopeChurchGreaterBundle:Attendance')
	->findAllAttendeesForEventByDate($event, $date);
    } else {
      $records = $em->getRepository('HopeChurchGreaterBundle:Attendance')
	->findAllAttendeesForEvent($event);
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

  public function getAttendeesByDateAction($event, $date, $_route)
  {
    $em = $this->getDoctrine()->getManager();


    if(!$records)
      {
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

}
