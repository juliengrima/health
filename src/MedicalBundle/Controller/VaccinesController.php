<?php

namespace MedicalBundle\Controller;

use MedicalBundle\Entity\Vaccines;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Vaccine controller.
 *
 */
class VaccinesController extends Controller
{
    /**
     * Lists all vaccine entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vaccines = $em->getRepository('MedicalBundle:Vaccines')->findAll();

        return $this->render('@Medical/vaccines/index.html.twig', array(
            'vaccines' => $vaccines,
        ));
    }

    /**
     * Creates a new vaccine entity.
     *
     */
    public function newAction(Request $request)
    {
        $vaccine = new Vaccine();
        $form = $this->createForm('MedicalBundle\Form\VaccinesType', $vaccine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vaccine);
            $em->flush();

            return $this->redirectToRoute('vaccines_show', array('id' => $vaccine->getId()));
        }

        return $this->render('@Medical/vaccines/new.html.twig', array(
            'vaccine' => $vaccine,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vaccine entity.
     *
     */
    public function showAction(Vaccines $vaccine)
    {
        $deleteForm = $this->createDeleteForm($vaccine);

        return $this->render('@Medical/vaccines/show.html.twig', array(
            'vaccine' => $vaccine,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vaccine entity.
     *
     */
    public function editAction(Request $request, Vaccines $vaccine)
    {
        $deleteForm = $this->createDeleteForm($vaccine);
        $editForm = $this->createForm('MedicalBundle\Form\VaccinesType', $vaccine);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vaccines_show', array('id' => $vaccine->getId()));
        }

        return $this->render('@Medical/vaccines/edit.html.twig', array(
            'vaccine' => $vaccine,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vaccine entity.
     *
     */
    public function deleteAction(Request $request, Vaccines $vaccine)
    {
        $form = $this->createDeleteForm($vaccine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vaccine);
            $em->flush();
        }

        return $this->redirectToRoute('vaccines_index');
    }

    /**
     * Creates a form to delete a vaccine entity.
     *
     * @param Vaccines $vaccine The vaccine entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vaccines $vaccine)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vaccines_delete', array('id' => $vaccine->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
