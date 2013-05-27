<?php

namespace HopeChurch\GreaterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HopeChurch\GreaterBundle\Form\Type\AddPersonType;
use HopeChurch\GreaterBundle\Entity\Person;

class DefaultController extends Controller
{
  private $pages = array(
    'home',
    'attendance',
    'add',
    'edit'
  );
  
  public function indexAction($page, $_format, $_route)
  {
    /* if they have asked for 'index', send them to 'home' */
    if($page == 'index')
    {
      $page = 'home';
    }		    

    return $this->render("HopeChurchGreaterBundle:Default:$page.$_format.twig", 
			 array(
	'route' => $_route,
	'active_page' => $page,
	'format' => $_format,
	'nav_pages' => $this->pages
      ));
  }
  
  public function addPersonAction($_route)
  {
    $person = new Person();

    $form = $this->createForm(new AddPersonType(), $person);

    return $this->render(
      'HopeChurchGreaterBundle:Default:addPerson.html.twig', 
      array(
        'form' => $form->createView(),
	'route' => $_route,
        'active_page' => 'add',
	'format' => '',
        'nav_pages' => $this->pages
      )
    );
  }
}
