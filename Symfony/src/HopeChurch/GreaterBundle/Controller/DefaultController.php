<?php

namespace HopeChurch\GreaterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use HopeChurch\GreaterBundle\Form\Type\AddPersonType;
use HopeChurch\GreaterBundle\Entity\Person;

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
      $twig = "HopeChurchGreaterBundle:Default:$page.$subpage.html.twig";
    } else {
      $twig = "HopeChurchGreaterBundle:Default:$page.html.twig";
    }

    return $this->render($twig,
                         array(
			       'route' => $_route
			       )
			 );
  }

  public function addPersonAction(Request $request, $_route)
  {
    $person = new Person();

    $form = $this->createForm(new AddPersonType(), $person);

    if ($request->isMethod('POST')) {
      $form->bind($request);

      if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($person);
        $em->flush();

        $nameFirst = $form->get('nameFirst')->getData();
        $this->get('session')->getFlashBag()->add('success',
                                       "$nameFirst was added successfully");

        return $this->redirect($this->generateUrl(
            'hope_church_greater_add_person'));
      }
      else
      {
        $this->get('session')->getFlashBag()->add('error',
                      'Failed to add person. Please correct the issues noted');
      }
    }

    return $this->render(
      'HopeChurchGreaterBundle:Default:addPerson.html.twig',
      array(
        'form' => $form->createView(),
	'route' => 'hope_church_greater',
        'active_page' => 'add',
        'active_subpage' => 'person',
        'nav_pages' => $this->pages,
        'csrf_protection' => true,
        'csrf_field_name' => '_token',
        // a unique key to help generate the secret token
        'intention'       => 'new_person',
      )
    );
  }
}
