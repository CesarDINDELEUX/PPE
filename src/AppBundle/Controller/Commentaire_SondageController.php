<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Commentaire_Sondage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Commentaire_sondage controller.
 *
 * @Route("commentaire_sondage")
 */
class Commentaire_SondageController extends Controller
{
    /**
     * Lists all commentaire_Sondage entities.
     *
     * @Route("/", name="commentaire_sondage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commentaire_Sondages = $em->getRepository('AppBundle:Commentaire_Sondage')->findAll();

        return $this->render('commentaire_sondage/index.html.twig', array(
            'commentaire_Sondages' => $commentaire_Sondages,
        ));
    }

    /**
     * Creates a new commentaire_Sondage entity.
     *
     * @Route("/new", name="commentaire_sondage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $commentaire_Sondage = new Commentaire_sondage();
        $form = $this->createForm('AppBundle\Form\Commentaire_SondageType', $commentaire_Sondage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentaire_Sondage);
            $em->flush();

            return $this->redirectToRoute('commentaire_sondage_show', array('id' => $commentaire_Sondage->getId()));
        }

        return $this->render('commentaire_sondage/new.html.twig', array(
            'commentaire_Sondage' => $commentaire_Sondage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a commentaire_Sondage entity.
     *
     * @Route("/{id}", name="commentaire_sondage_show")
     * @Method("GET")
     */
    public function showAction(Commentaire_Sondage $commentaire_Sondage)
    {
        $deleteForm = $this->createDeleteForm($commentaire_Sondage);

        return $this->render('commentaire_sondage/show.html.twig', array(
            'commentaire_Sondage' => $commentaire_Sondage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commentaire_Sondage entity.
     *
     * @Route("/{id}/edit", name="commentaire_sondage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Commentaire_Sondage $commentaire_Sondage)
    {
        $deleteForm = $this->createDeleteForm($commentaire_Sondage);
        $editForm = $this->createForm('AppBundle\Form\Commentaire_SondageType', $commentaire_Sondage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commentaire_sondage_edit', array('id' => $commentaire_Sondage->getId()));
        }

        return $this->render('commentaire_sondage/edit.html.twig', array(
            'commentaire_Sondage' => $commentaire_Sondage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commentaire_Sondage entity.
     *
     * @Route("/{id}", name="commentaire_sondage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Commentaire_Sondage $commentaire_Sondage)
    {
        $form = $this->createDeleteForm($commentaire_Sondage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commentaire_Sondage);
            $em->flush();
        }

        return $this->redirectToRoute('commentaire_sondage_index');
    }

    /**
     * Creates a form to delete a commentaire_Sondage entity.
     *
     * @param Commentaire_Sondage $commentaire_Sondage The commentaire_Sondage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Commentaire_Sondage $commentaire_Sondage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commentaire_sondage_delete', array('id' => $commentaire_Sondage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
