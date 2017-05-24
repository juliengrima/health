<?php

namespace MedicalBundle\Controller;

use MedicalBundle\Entity\Others;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Other controller.
 *
 */
class OthersController extends Controller
{
    /**
     * Lists all other entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $others = $em->getRepository('MedicalBundle:Others')->findAll();

        return $this->render('others/index.html.twig', array(
            'others' => $others,
        ));
    }

    /**
     * Creates a new other entity.
     *
     */
    public function newAction(Request $request)
    {
        $other = new Other();
        $form = $this->createForm('MedicalBundle\Form\OthersType', $other);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($other);
            $em->flush();

            return $this->redirectToRoute('others_show', array('id' => $other->getId()));
        }

        return $this->render('others/new.html.twig', array(
            'other' => $other,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a other entity.
     *
     */
    public function showAction(Others $other)
    {
        $deleteForm = $this->createDeleteForm($other);

        return $this->render('others/show.html.twig', array(
            'other' => $other,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing other entity.
     *
     */
    public function editAction(Request $request, Others $other)
    {
        $deleteForm = $this->createDeleteForm($other);
        $editForm = $this->createForm('MedicalBundle\Form\OthersType', $other);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('others_edit', array('id' => $other->getId()));
        }

        return $this->render('others/edit.html.twig', array(
            'other' => $other,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a other entity.
     *
     */
    public function deleteAction(Request $request, Others $other)
    {
        $form = $this->createDeleteForm($other);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($other);
            $em->flush();
        }

        return $this->redirectToRoute('others_index');
    }

    /**
     * Creates a form to delete a other entity.
     *
     * @param Others $other The other entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Others $other)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('others_delete', array('id' => $other->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
