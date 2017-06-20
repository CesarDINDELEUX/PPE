<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Commentaire_Quizz;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Commentaire_quizz controller.
 *
 * @Route("commentaire_quizz")
 */
class Commentaire_QuizzController extends Controller
{
    /**
     * Lists all commentaire_Quizz entities.
     *
     * @Route("/", name="commentaire_quizz_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commentaire_Quizzs = $em->getRepository('AppBundle:Commentaire_Quizz')->findAll();

        return $this->render('commentaire_quizz/index.html.twig', array(
            'commentaire_Quizzs' => $commentaire_Quizzs,
        ));
    }

    /**
     * Creates a new commentaire_Quizz entity.
     *
     * @Route("/new", name="commentaire_quizz_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $commentaire_Quizz = new Commentaire_quizz();
        $form = $this->createForm('AppBundle\Form\Commentaire_QuizzType', $commentaire_Quizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentaire_Quizz);
            $em->flush();

            return $this->redirectToRoute('commentaire_quizz_show', array('id' => $commentaire_Quizz->getId()));
        }

        return $this->render('commentaire_quizz/new.html.twig', array(
            'commentaire_Quizz' => $commentaire_Quizz,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a commentaire_Quizz entity.
     *
     * @Route("/{id}", name="commentaire_quizz_show")
     * @Method("GET")
     */
    public function showAction(Commentaire_Quizz $commentaire_Quizz)
    {
        $deleteForm = $this->createDeleteForm($commentaire_Quizz);

        return $this->render('commentaire_quizz/show.html.twig', array(
            'commentaire_Quizz' => $commentaire_Quizz,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commentaire_Quizz entity.
     *
     * @Route("/{id}/edit", name="commentaire_quizz_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Commentaire_Quizz $commentaire_Quizz)
    {
        $deleteForm = $this->createDeleteForm($commentaire_Quizz);
        $editForm = $this->createForm('AppBundle\Form\Commentaire_QuizzType', $commentaire_Quizz);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commentaire_quizz_edit', array('id' => $commentaire_Quizz->getId()));
        }

        return $this->render('commentaire_quizz/edit.html.twig', array(
            'commentaire_Quizz' => $commentaire_Quizz,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commentaire_Quizz entity.
     *
     * @Route("/{id}", name="commentaire_quizz_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Commentaire_Quizz $commentaire_Quizz)
    {
        $form = $this->createDeleteForm($commentaire_Quizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commentaire_Quizz);
            $em->flush();
        }

        return $this->redirectToRoute('commentaire_quizz_index');
    }

    /**
     * Creates a form to delete a commentaire_Quizz entity.
     *
     * @param Commentaire_Quizz $commentaire_Quizz The commentaire_Quizz entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Commentaire_Quizz $commentaire_Quizz)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commentaire_quizz_delete', array('id' => $commentaire_Quizz->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
