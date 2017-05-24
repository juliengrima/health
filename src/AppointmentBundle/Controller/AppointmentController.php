<?php

namespace AppointmentBundle\Controller;

use AppointmentBundle\Entity\Appointment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Appointment controller.
 *
 */
class AppointmentController extends Controller
{
    /**
     * Lists all appointment entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $appointments = $em->getRepository('AppointmentBundle:Appointment')->findAll();

        return $this->render('@Appointment/appointment/index.html.twig', array(
            'appointments' => $appointments,
        ));
    }

    /**
     * Creates a new appointment entity.
     *
     */
    public function newAction(Request $request)
    {
        $appointment = new Appointment();
        $user = $this->getUser();
        $form = $this->createForm('AppointmentBundle\Form\InfoAppointmentType', $appointment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($appointment);
            $em->flush();

            return $this->redirectToRoute('appointment_show', array('id' => $appointment->getId()));
        }

        return $this->render('@Appointment/appointment/new.html.twig', array(
            'appointment' => $appointment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a appointment entity.
     *
     */
    public function showAction(Appointment $appointment)
    {
        $deleteForm = $this->createDeleteForm($appointment);

        return $this->render('@Appointment/appointment/show.html.twig', array(
            'appointment' => $appointment,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing appointment entity.
     *
     */
    public function editAction(Request $request, Appointment $appointment)
    {
        $deleteForm = $this->createDeleteForm($appointment);
        $editForm = $this->createForm('AppointmentBundle\Form\AppointmentType', $appointment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('appointment_show', array('id' => $appointment->getId()));
        }

        return $this->render('@Appointment/appointment/edit.html.twig', array(
            'appointment' => $appointment,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a appointment entity.
     *
     */
    public function deleteAction(Request $request, Appointment $appointment)
    {
        $form = $this->createDeleteForm($appointment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($appointment);
            $em->flush();
        }

        return $this->redirectToRoute('appointment_index');
    }

    /**
     * Creates a form to delete a appointment entity.
     *
     * @param Appointment $appointment The appointment entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Appointment $appointment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('appointment_delete', array('id' => $appointment->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
