<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Question_Quizz;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Question_quizz controller.
 *
 * @Route("question_quizz")
 */
class Question_QuizzController extends Controller
{
    /**
     * Lists all question_Quizz entities.
     *
     * @Route("/", name="question_quizz_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $question_Quizzs = $em->getRepository('AppBundle:Question_Quizz')->findAll();

        return $this->render('question_quizz/index.html.twig', array(
            'question_Quizzs' => $question_Quizzs,
        ));
    }

    /**
     * Creates a new question_Quizz entity.
     *
     * @Route("/new", name="question_quizz_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $question_Quizz = new Question_quizz();
        $form = $this->createForm('AppBundle\Form\Question_QuizzType', $question_Quizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($question_Quizz);
            $em->flush();

            return $this->redirectToRoute('question_quizz_show', array('id' => $question_Quizz->getId()));
        }

        return $this->render('question_quizz/new.html.twig', array(
            'question_Quizz' => $question_Quizz,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a question_Quizz entity.
     *
     * @Route("/{id}", name="question_quizz_show")
     * @Method("GET")
     */
    public function showAction(Question_Quizz $question_Quizz)
    {
        $deleteForm = $this->createDeleteForm($question_Quizz);

        return $this->render('question_quizz/show.html.twig', array(
            'question_Quizz' => $question_Quizz,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing question_Quizz entity.
     *
     * @Route("/{id}/edit", name="question_quizz_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Question_Quizz $question_Quizz)
    {
        $deleteForm = $this->createDeleteForm($question_Quizz);
        $editForm = $this->createForm('AppBundle\Form\Question_QuizzType', $question_Quizz);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('question_quizz_edit', array('id' => $question_Quizz->getId()));
        }

        return $this->render('question_quizz/edit.html.twig', array(
            'question_Quizz' => $question_Quizz,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a question_Quizz entity.
     *
     * @Route("/{id}", name="question_quizz_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Question_Quizz $question_Quizz)
    {
        $form = $this->createDeleteForm($question_Quizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($question_Quizz);
            $em->flush();
        }

        return $this->redirectToRoute('question_quizz_index');
    }

    /**
     * Creates a form to delete a question_Quizz entity.
     *
     * @param Question_Quizz $question_Quizz The question_Quizz entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Question_Quizz $question_Quizz)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('question_quizz_delete', array('id' => $question_Quizz->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
