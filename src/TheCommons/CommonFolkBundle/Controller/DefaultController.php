<?php

namespace TheCommons\CommonFolkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use TheCommons\CommonFolkBundle\Form\Type\AddPersonType;
use TheCommons\CommonFolkBundle\Entity\Person;

class DefaultController extends Controller
{
  private $pages = array(
    'home' => array(),
    'attendance' => array(),
    'add' => array('person', 'family', 'community group'),
    'view' => array('people')
  );

  public function indexAction($page, $subpage, $_route)
  {
    /* if they have asked for 'index', send them to 'home' */
    if($page == 'index') {
      $page = 'home';
    }

    if(isset($subpage)) {
      $twig = "TheCommonsCommonFolkBundle:Default:$page.$subpage.html.twig";
    } else {
      $twig = "TheCommonsCommonFolkBundle:Default:$page.html.twig";
    }

    return $this->render($twig,
                         array(
			       'route' => $_route
			       )
			 );
  }
}
