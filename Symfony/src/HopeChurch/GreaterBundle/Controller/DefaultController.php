<?php

namespace HopeChurch\GreaterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($page)
    {
        return $this->render('HopeChurchGreaterBundle:Default:index.html.twig', 
			     array('page' => $page));
    }
}
