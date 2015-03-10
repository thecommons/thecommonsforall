<?php

namespace TheCommons\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
  public function indexAction($page, $_route)
  {
    $twig = "TheCommonsSecurityBundle:Admin:$page.html.twig";

    return $this->render($twig,
        array('route' => $_route));
  }
}
