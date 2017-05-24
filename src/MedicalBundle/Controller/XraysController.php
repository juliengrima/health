<?php

namespace MedicalBundle\Controller;

use MedicalBundle\Entity\Xrays;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Xray controller.
 *
 */
class XraysController extends Controller
{
    /**
     * Lists all xray entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $xrays = $em->getRepository('MedicalBundle:Xrays')->findAll();

        return $this->render('@Medical/xrays/index.html.twig', array(
            'xrays' => $xrays,
        ));
    }

    /**
     * Creates a new xray entity.
     *
     */
    public function newAction(Request $request)
    {
        $xray = new Xray();
        $form = $this->createForm('MedicalBundle\Form\XraysType', $xray);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($xray);
            $em->flush();

            return $this->redirectToRoute('xrays_show', array('id' => $xray->getId()));
        }

        return $this->render('@Medical/xrays/new.html.twig', array(
            'xray' => $xray,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a xray entity.
     *
     */
    public function showAction(Xrays $xray)
    {
        $deleteForm = $this->createDeleteForm($xray);

        return $this->render('@Medical/xrays/show.html.twig', array(
            'xray' => $xray,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing xray entity.
     *
     */
    public function editAction(Request $request, Xrays $xray)
    {
        $deleteForm = $this->createDeleteForm($xray);
        $editForm = $this->createForm('MedicalBundle\Form\XraysType', $xray);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('xrays_show', array('id' => $xray->getId()));
        }

        return $this->render('@Medical/xrays/edit.html.twig', array(
            'xray' => $xray,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a xray entity.
     *
     */
    public function deleteAction(Request $request, Xrays $xray)
    {
        $form = $this->createDeleteForm($xray);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($xray);
            $em->flush();
        }

        return $this->redirectToRoute('xrays_index');
    }

    /**
     * Creates a form to delete a xray entity.
     *
     * @param Xrays $xray The xray entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Xrays $xray)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('xrays_delete', array('id' => $xray->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
