<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Question_Sondage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Question_sondage controller.
 *
 * @Route("question_sondage")
 */
class Question_SondageController extends Controller
{
    /**
     * Lists all question_Sondage entities.
     *
     * @Route("/", name="question_sondage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $question_Sondages = $em->getRepository('AppBundle:Question_Sondage')->findAll();

        return $this->render('question_sondage/index.html.twig', array(
            'question_Sondages' => $question_Sondages,
        ));
    }

    /**
     * Creates a new question_Sondage entity.
     *
     * @Route("/new", name="question_sondage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $question_Sondage = new Question_sondage();
        $form = $this->createForm('AppBundle\Form\Question_SondageType', $question_Sondage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($question_Sondage);
            $em->flush();

            return $this->redirectToRoute('question_sondage_show', array('id' => $question_Sondage->getId()));
        }

        return $this->render('question_sondage/new.html.twig', array(
            'question_Sondage' => $question_Sondage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a question_Sondage entity.
     *
     * @Route("/{id}", name="question_sondage_show")
     * @Method("GET")
     */
    public function showAction(Question_Sondage $question_Sondage)
    {
        $deleteForm = $this->createDeleteForm($question_Sondage);

        return $this->render('question_sondage/show.html.twig', array(
            'question_Sondage' => $question_Sondage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing question_Sondage entity.
     *
     * @Route("/{id}/edit", name="question_sondage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Question_Sondage $question_Sondage)
    {
        $deleteForm = $this->createDeleteForm($question_Sondage);
        $editForm = $this->createForm('AppBundle\Form\Question_SondageType', $question_Sondage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('question_sondage_edit', array('id' => $question_Sondage->getId()));
        }

        return $this->render('question_sondage/edit.html.twig', array(
            'question_Sondage' => $question_Sondage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a question_Sondage entity.
     *
     * @Route("/{id}", name="question_sondage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Question_Sondage $question_Sondage)
    {
        $form = $this->createDeleteForm($question_Sondage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($question_Sondage);
            $em->flush();
        }

        return $this->redirectToRoute('question_sondage_index');
    }

    /**
     * Creates a form to delete a question_Sondage entity.
     *
     * @param Question_Sondage $question_Sondage The question_Sondage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Question_Sondage $question_Sondage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('question_sondage_delete', array('id' => $question_Sondage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
