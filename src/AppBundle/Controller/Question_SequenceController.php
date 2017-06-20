<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Question_Sequence;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Question_sequence controller.
 *
 * @Route("question_sequence")
 */
class Question_SequenceController extends Controller
{
    /**
     * Lists all question_Sequence entities.
     *
     * @Route("/", name="question_sequence_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $question_Sequences = $em->getRepository('AppBundle:Question_Sequence')->findAll();

        return $this->render('question_sequence/index.html.twig', array(
            'question_Sequences' => $question_Sequences,
        ));
    }

    /**
     * Creates a new question_Sequence entity.
     *
     * @Route("/new", name="question_sequence_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $question_Sequence = new Question_sequence();
        $form = $this->createForm('AppBundle\Form\Question_SequenceType', $question_Sequence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($question_Sequence);
            $em->flush();

            return $this->redirectToRoute('question_sequence_show', array('id' => $question_Sequence->getId()));
        }

        return $this->render('question_sequence/new.html.twig', array(
            'question_Sequence' => $question_Sequence,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a question_Sequence entity.
     *
     * @Route("/{id}", name="question_sequence_show")
     * @Method("GET")
     */
    public function showAction(Question_Sequence $question_Sequence)
    {
        $deleteForm = $this->createDeleteForm($question_Sequence);

        return $this->render('question_sequence/show.html.twig', array(
            'question_Sequence' => $question_Sequence,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing question_Sequence entity.
     *
     * @Route("/{id}/edit", name="question_sequence_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Question_Sequence $question_Sequence)
    {
        $deleteForm = $this->createDeleteForm($question_Sequence);
        $editForm = $this->createForm('AppBundle\Form\Question_SequenceType', $question_Sequence);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('question_sequence_edit', array('id' => $question_Sequence->getId()));
        }

        return $this->render('question_sequence/edit.html.twig', array(
            'question_Sequence' => $question_Sequence,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a question_Sequence entity.
     *
     * @Route("/{id}", name="question_sequence_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Question_Sequence $question_Sequence)
    {
        $form = $this->createDeleteForm($question_Sequence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($question_Sequence);
            $em->flush();
        }

        return $this->redirectToRoute('question_sequence_index');
    }

    /**
     * Creates a form to delete a question_Sequence entity.
     *
     * @param Question_Sequence $question_Sequence The question_Sequence entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Question_Sequence $question_Sequence)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('question_sequence_delete', array('id' => $question_Sequence->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
