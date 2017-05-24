<?php

namespace MedicalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MedicalBundle:Default:index.html.twig');
    }
}
