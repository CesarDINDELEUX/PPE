<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reponse_Quizz;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Reponse_quizz controller.
 *
 * @Route("reponse_quizz")
 */
class Reponse_QuizzController extends Controller
{
    /**
     * Lists all reponse_Quizz entities.
     *
     * @Route("/", name="reponse_quizz_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reponse_Quizzs = $em->getRepository('AppBundle:Reponse_Quizz')->findAll();

        return $this->render('reponse_quizz/index.html.twig', array(
            'reponse_Quizzs' => $reponse_Quizzs,
        ));
    }

    /**
     * Creates a new reponse_Quizz entity.
     *
     * @Route("/new", name="reponse_quizz_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reponse_Quizz = new Reponse_quizz();
        $form = $this->createForm('AppBundle\Form\Reponse_QuizzType', $reponse_Quizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reponse_Quizz);
            $em->flush();

            return $this->redirectToRoute('reponse_quizz_show', array('id' => $reponse_Quizz->getId()));
        }

        return $this->render('reponse_quizz/new.html.twig', array(
            'reponse_Quizz' => $reponse_Quizz,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reponse_Quizz entity.
     *
     * @Route("/{id}", name="reponse_quizz_show")
     * @Method("GET")
     */
    public function showAction(Reponse_Quizz $reponse_Quizz)
    {
        $deleteForm = $this->createDeleteForm($reponse_Quizz);

        return $this->render('reponse_quizz/show.html.twig', array(
            'reponse_Quizz' => $reponse_Quizz,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reponse_Quizz entity.
     *
     * @Route("/{id}/edit", name="reponse_quizz_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reponse_Quizz $reponse_Quizz)
    {
        $deleteForm = $this->createDeleteForm($reponse_Quizz);
        $editForm = $this->createForm('AppBundle\Form\Reponse_QuizzType', $reponse_Quizz);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reponse_quizz_edit', array('id' => $reponse_Quizz->getId()));
        }

        return $this->render('reponse_quizz/edit.html.twig', array(
            'reponse_Quizz' => $reponse_Quizz,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reponse_Quizz entity.
     *
     * @Route("/{id}", name="reponse_quizz_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reponse_Quizz $reponse_Quizz)
    {
        $form = $this->createDeleteForm($reponse_Quizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reponse_Quizz);
            $em->flush();
        }

        return $this->redirectToRoute('reponse_quizz_index');
    }

    /**
     * Creates a form to delete a reponse_Quizz entity.
     *
     * @param Reponse_Quizz $reponse_Quizz The reponse_Quizz entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reponse_Quizz $reponse_Quizz)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reponse_quizz_delete', array('id' => $reponse_Quizz->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
