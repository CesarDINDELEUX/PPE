<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Quizz;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Quizz controller.
 *
 * @Route("quizz")
 */
class QuizzController extends Controller
{
    /**
     * Lists all quizz entities.
     *
     * @Route("/", name="quizz_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $quizzs = $em->getRepository('AppBundle:Quizz')->findAll();

        return $this->render('quizz/index.html.twig', array(
            'quizzs' => $quizzs,
        ));
    }

    /**
     * Creates a new quizz entity.
     *
     * @Route("/new", name="quizz_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $quizz = new Quizz();
        $form = $this->createForm('AppBundle\Form\QuizzType', $quizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($quizz);
            $em->flush();

            return $this->redirectToRoute('quizz_show', array('id' => $quizz->getId()));
        }

        return $this->render('quizz/new.html.twig', array(
            'quizz' => $quizz,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a quizz entity.
     *
     * @Route("/{id}", name="quizz_show")
     * @Method("GET")
     */
    public function showAction(Quizz $quizz)
    {
        $deleteForm = $this->createDeleteForm($quizz);

        return $this->render('quizz/show.html.twig', array(
            'quizz' => $quizz,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing quizz entity.
     *
     * @Route("/{id}/edit", name="quizz_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Quizz $quizz)
    {
        $deleteForm = $this->createDeleteForm($quizz);
        $editForm = $this->createForm('AppBundle\Form\QuizzType', $quizz);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('quizz_edit', array('id' => $quizz->getId()));
        }

        return $this->render('quizz/edit.html.twig', array(
            'quizz' => $quizz,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a quizz entity.
     *
     * @Route("/{id}", name="quizz_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Quizz $quizz)
    {
        $form = $this->createDeleteForm($quizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($quizz);
            $em->flush();
        }

        return $this->redirectToRoute('quizz_index');
    }

    /**
     * Creates a form to delete a quizz entity.
     *
     * @param Quizz $quizz The quizz entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Quizz $quizz)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('quizz_delete', array('id' => $quizz->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
