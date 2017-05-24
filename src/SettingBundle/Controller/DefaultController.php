<?php

namespace SettingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
//        $famillies = $em->getRepository('HealthBundle:Familly')->findAll();
        $informations = $em->getRepository('InformationBundle:Information')->findAll();

        return $this->render('SettingBundle:Default:index.html.twig', array(
            'informations' => $informations,
            )
        );
    }
}
