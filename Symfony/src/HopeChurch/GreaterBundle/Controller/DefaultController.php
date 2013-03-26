<?php

namespace HopeChurch\GreaterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
}
