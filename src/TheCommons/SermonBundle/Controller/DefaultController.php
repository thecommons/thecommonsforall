<?php

namespace TheCommons\SermonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TheCommonsSermonBundle:Default:index.html.twig', array('name' => $name));
    }
}
