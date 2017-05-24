<?php

namespace MedicalBundle\Controller;

use MedicalBundle\Entity\Medication;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Medication controller.
 *
 */
class MedicationController extends Controller
{
    /**
     * Lists all medication entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $medications = $em->getRepository('MedicalBundle:Medication')->findAll();

        return $this->render('@Medical/medication/index.html.twig', array(
            'medications' => $medications,
        ));
    }

    /**
     * Creates a new medication entity.
     *
     */
    public function newAction(Request $request)
    {
        $medication = new Medication();
        $form = $this->createForm('MedicalBundle\Form\MedicationType', $medication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medication);
            $em->flush();

            return $this->redirectToRoute('medication_show', array('id' => $medication->getId()));
        }

        return $this->render('@Medical/medication/new.html.twig', array(
            'medication' => $medication,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a medication entity.
     *
     */
    public function showAction(Medication $medication)
    {
        $deleteForm = $this->createDeleteForm($medication);

        return $this->render('@Medical/medication/show.html.twig', array(
            'medication' => $medication,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing medication entity.
     *
     */
    public function editAction(Request $request, Medication $medication)
    {
        $deleteForm = $this->createDeleteForm($medication);
        $editForm = $this->createForm('MedicalBundle\Form\MedicationType', $medication);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('medication_show', array('id' => $medication->getId()));
        }

        return $this->render('@Medical/dentist/edit.html.twig', array(
            'medication' => $medication,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a medication entity.
     *
     */
    public function deleteAction(Request $request, Medication $medication)
    {
        $form = $this->createDeleteForm($medication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($medication);
            $em->flush();
        }

        return $this->redirectToRoute('medication_index');
    }

    /**
     * Creates a form to delete a medication entity.
     *
     * @param Medication $medication The medication entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Medication $medication)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('medication_delete', array('id' => $medication->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
