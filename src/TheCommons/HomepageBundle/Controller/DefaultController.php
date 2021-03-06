<?php

namespace TheCommons\HomepageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($page, $_route)
    {
        /* if they have asked for 'index', send them to 'home' */
        if ($page == 'index') {
            $page = 'home';
        }

        $twig = "TheCommonsHomepageBundle:Default:$page.html.twig";

        try {
            $result = $this->render($twig, ['route' => $_route]);
        } catch (\InvalidArgumentException $ex) {
            throw $this->createNotFoundException('Page \'' . $page . '\' does not exist');
        }

        return $result;
    }
}
