<?php

namespace AppointmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppointmentBundle:Default:index.html.twig');
    }
}
