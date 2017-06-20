<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Commentaire_Enquete;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Commentaire_enquete controller.
 *
 * @Route("commentaire_enquete")
 */
class Commentaire_EnqueteController extends Controller
{
    /**
     * Lists all commentaire_Enquete entities.
     *
     * @Route("/", name="commentaire_enquete_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commentaire_Enquetes = $em->getRepository('AppBundle:Commentaire_Enquete')->findAll();

        return $this->render('commentaire_enquete/index.html.twig', array(
            'commentaire_Enquetes' => $commentaire_Enquetes,
        ));
    }

    /**
     * Creates a new commentaire_Enquete entity.
     *
     * @Route("/new", name="commentaire_enquete_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $commentaire_Enquete = new Commentaire_enquete();
        $form = $this->createForm('AppBundle\Form\Commentaire_EnqueteType', $commentaire_Enquete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentaire_Enquete);
            $em->flush();

            return $this->redirectToRoute('commentaire_enquete_show', array('id' => $commentaire_Enquete->getId()));
        }

        return $this->render('commentaire_enquete/new.html.twig', array(
            'commentaire_Enquete' => $commentaire_Enquete,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a commentaire_Enquete entity.
     *
     * @Route("/{id}", name="commentaire_enquete_show")
     * @Method("GET")
     */
    public function showAction(Commentaire_Enquete $commentaire_Enquete)
    {
        $deleteForm = $this->createDeleteForm($commentaire_Enquete);

        return $this->render('commentaire_enquete/show.html.twig', array(
            'commentaire_Enquete' => $commentaire_Enquete,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commentaire_Enquete entity.
     *
     * @Route("/{id}/edit", name="commentaire_enquete_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Commentaire_Enquete $commentaire_Enquete)
    {
        $deleteForm = $this->createDeleteForm($commentaire_Enquete);
        $editForm = $this->createForm('AppBundle\Form\Commentaire_EnqueteType', $commentaire_Enquete);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commentaire_enquete_edit', array('id' => $commentaire_Enquete->getId()));
        }

        return $this->render('commentaire_enquete/edit.html.twig', array(
            'commentaire_Enquete' => $commentaire_Enquete,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commentaire_Enquete entity.
     *
     * @Route("/{id}", name="commentaire_enquete_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Commentaire_Enquete $commentaire_Enquete)
    {
        $form = $this->createDeleteForm($commentaire_Enquete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commentaire_Enquete);
            $em->flush();
        }

        return $this->redirectToRoute('commentaire_enquete_index');
    }

    /**
     * Creates a form to delete a commentaire_Enquete entity.
     *
     * @param Commentaire_Enquete $commentaire_Enquete The commentaire_Enquete entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Commentaire_Enquete $commentaire_Enquete)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commentaire_enquete_delete', array('id' => $commentaire_Enquete->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
