<?php

namespace HealthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HealthBundle:Default:index.html.twig');
    }

    public function famillyAction()
    {
        return $this->render('HealthBundle:Default:index.html.twig');
    }
}
