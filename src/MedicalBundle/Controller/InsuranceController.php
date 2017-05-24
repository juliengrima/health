<?php

namespace MedicalBundle\Controller;

use MedicalBundle\Entity\Insurance;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Insurance controller.
 *
 */
class InsuranceController extends Controller
{
    /**
     * Lists all insurance entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $insurances = $em->getRepository('MedicalBundle:Insurance')->findAll();

        return $this->render('@Medical/insurance/index.html.twig', array(
            'insurances' => $insurances,
        ));
    }

    /**
     * Creates a new insurance entity.
     *
     */
    public function newAction(Request $request)
    {
        $insurance = new Insurance();
        $form = $this->createForm('MedicalBundle\Form\InsuranceType', $insurance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($insurance);
            $em->flush();

            return $this->redirectToRoute('insurance_show', array('id' => $insurance->getId()));
        }

        return $this->render('@Medical/insurance/new.html.twig', array(
            'insurance' => $insurance,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a insurance entity.
     *
     */
    public function showAction(Insurance $insurance)
    {
        $deleteForm = $this->createDeleteForm($insurance);

        return $this->render('@Medical/insurance/show.html.twig', array(
            'insurance' => $insurance,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing insurance entity.
     *
     */
    public function editAction(Request $request, Insurance $insurance)
    {
        $deleteForm = $this->createDeleteForm($insurance);
        $editForm = $this->createForm('MedicalBundle\Form\InsuranceType', $insurance);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('insurance_show', array('id' => $insurance->getId()));
        }

        return $this->render('@Medical/insurance/edit.html.twig', array(
            'insurance' => $insurance,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a insurance entity.
     *
     */
    public function deleteAction(Request $request, Insurance $insurance)
    {
        $form = $this->createDeleteForm($insurance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($insurance);
            $em->flush();
        }

        return $this->redirectToRoute('insurance_index');
    }

    /**
     * Creates a form to delete a insurance entity.
     *
     * @param Insurance $insurance The insurance entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Insurance $insurance)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('insurance_delete', array('id' => $insurance->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
