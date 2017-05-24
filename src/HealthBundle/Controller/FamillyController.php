<?php

namespace HealthBundle\Controller;

use UserBundle\Entity\User;
use HealthBundle\Entity\Familly;
use InformationBundle\Entity\Information;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Familly controller.
 *
 */
class FamillyController extends Controller
{
    /**
     * Lists all familly entities.
     *
     */
    public function indexAction(Request $request)
    {
//        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
//        $user = $request->get('{{ app.user.id }}');
        $famillies = $em->getRepository('HealthBundle:Familly')->findAll();

        return $this->render('@Health/familly/index.html.twig', array(
            'famillies' => $famillies,
//            'user' => $user,
        ));
    }

    /**
     * Creates a new familly entity.
     *
     */
    public function newAction(Request $request)
    {
        $familly = new Familly();

        $form = $this->createForm('HealthBundle\Form\FamillyType', $familly);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Get uploaded file
            $picture = $familly->getpicture();
            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$picture->guessExtension();
            // Move the file to the directory where brochures are stored
            $picture->move(
                $this->getParameter('pictures_directory'),
                $fileName
            );
            // Update the 'picture' property to store the file name
            // instead of its contents
            $familly->setpicture($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($familly);
            $em->flush();

            return $this->redirectToRoute('familly_show', array('id' => $familly->getId()));
        }

        return $this->render('@Health/familly/new.html.twig', array(
            'familly' => $familly,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a familly entity.
     *
     */
    public function showAction(Familly $familly, Information $information, User $user)

    {
        $em = $this->getDoctrine()->getManager();

        // APPEL DU REPOSITORY INFORMATION POUR RECUPERER LES DONNEES EN FONCTION DE L'ID DE FAMILLY
        $information = $em->getRepository('InformationBundle:Information')->findBy(array('id' => $familly->getInformation()));

        $deleteForm = $this->createDeleteForm($familly);

        return $this->render('@Health/familly/show.html.twig', array(
            'familly' => $familly,
            'information' => $information,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing familly entity.
     *
     */
    public function editAction(Request $request, Familly $familly, Information $information)
    {
        $deleteForm = $this->createDeleteForm($familly);
        $editForm = $this->createForm('HealthBundle\Form\Edit_FamillyType', $familly);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()){

            // Get uploaded file
            $picture = $familly->getpicture();
            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$picture->guessExtension();
            // Move the file to the directory where brochures are stored
            $picture->move(
                $this->getParameter('pictures_directory'),
                $fileName
            );
            // Update the 'picture' property to store the file name
            // instead of its contents
            $familly->setpicture($fileName);

//            $familly->setInformation($information->getId());

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('familly_show', array('id' => $familly->getId()));
        }

        return $this->render('@Health/familly/edit.html.twig', array(
            'familly' => $familly,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a familly entity.
     *
     */
    public function deleteAction(Request $request, Familly $familly)
    {
        $form = $this->createDeleteForm($familly);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($familly);
            $em->flush();
        }

        return $this->redirectToRoute('familly_index');
    }

    /**
     * Creates a form to delete a familly entity.
     *
     * @param Familly $familly The familly entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Familly $familly)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('familly_delete', array('id' => $familly->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
