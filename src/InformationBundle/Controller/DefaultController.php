<?php

namespace InformationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('InformationBundle:Default:index.html.twig');
    }
}
