<?php

namespace MedicalBundle\Controller;

use MedicalBundle\Entity\Dentist;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Dentist controller.
 *
 */
class DentistController extends Controller
{
    /**
     * Lists all dentist entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dentists = $em->getRepository('MedicalBundle:Dentist')->findAll();

        return $this->render('@Medical/dentist/index.html.twig', array(
            'dentists' => $dentists,
        ));
    }

    /**
     * Creates a new dentist entity.
     *
     */
    public function newAction(Request $request)
    {
        $dentist = new Dentist();
        $form = $this->createForm('MedicalBundle\Form\DentistType', $dentist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dentist);
            $em->flush();

            return $this->redirectToRoute('dentist_show', array('id' => $dentist->getId()));
        }

        return $this->render('@Medical/dentist/new.html.twig', array(
            'dentist' => $dentist,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dentist entity.
     *
     */
    public function showAction(Dentist $dentist)
    {
        $deleteForm = $this->createDeleteForm($dentist);

        return $this->render('@Medical/dentist/show.html.twig', array(
            'dentist' => $dentist,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dentist entity.
     *
     */
    public function editAction(Request $request, Dentist $dentist)
    {
        $deleteForm = $this->createDeleteForm($dentist);
        $editForm = $this->createForm('MedicalBundle\Form\DentistType', $dentist);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dentist_show', array('id' => $dentist->getId()));
        }

        return $this->render('@Medical/dentist/edit.html.twig', array(
            'dentist' => $dentist,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dentist entity.
     *
     */
    public function deleteAction(Request $request, Dentist $dentist)
    {
        $form = $this->createDeleteForm($dentist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dentist);
            $em->flush();
        }

        return $this->redirectToRoute('dentist_index');
    }

    /**
     * Creates a form to delete a dentist entity.
     *
     * @param Dentist $dentist The dentist entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Dentist $dentist)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dentist_delete', array('id' => $dentist->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
