<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Quizz_Complet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Quizz_complet controller.
 *
 * @Route("quizz_complet")
 */
class Quizz_CompletController extends Controller
{
    /**
     * Lists all quizz_Complet entities.
     *
     * @Route("/", name="quizz_complet_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $quizz_Complets = $em->getRepository('AppBundle:Quizz_Complet')->findAll();

        return $this->render('quizz_complet/index.html.twig', array(
            'quizz_Complets' => $quizz_Complets,
        ));
    }

    /**
     * Creates a new quizz_Complet entity.
     *
     * @Route("/new", name="quizz_complet_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $quizz_Complet = new Quizz_complet();
        $form = $this->createForm('AppBundle\Form\Quizz_CompletType', $quizz_Complet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($quizz_Complet);
            $em->flush();

            return $this->redirectToRoute('quizz_complet_show', array('id' => $quizz_Complet->getId()));
        }

        return $this->render('quizz_complet/new.html.twig', array(
            'quizz_Complet' => $quizz_Complet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a quizz_Complet entity.
     *
     * @Route("/{id}", name="quizz_complet_show")
     * @Method("GET")
     */
    public function showAction(Quizz_Complet $quizz_Complet)
    {
        $deleteForm = $this->createDeleteForm($quizz_Complet);

        return $this->render('quizz_complet/show.html.twig', array(
            'quizz_Complet' => $quizz_Complet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing quizz_Complet entity.
     *
     * @Route("/{id}/edit", name="quizz_complet_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Quizz_Complet $quizz_Complet)
    {
        $deleteForm = $this->createDeleteForm($quizz_Complet);
        $editForm = $this->createForm('AppBundle\Form\Quizz_CompletType', $quizz_Complet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('quizz_complet_edit', array('id' => $quizz_Complet->getId()));
        }

        return $this->render('quizz_complet/edit.html.twig', array(
            'quizz_Complet' => $quizz_Complet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a quizz_Complet entity.
     *
     * @Route("/{id}", name="quizz_complet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Quizz_Complet $quizz_Complet)
    {
        $form = $this->createDeleteForm($quizz_Complet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($quizz_Complet);
            $em->flush();
        }

        return $this->redirectToRoute('quizz_complet_index');
    }

    /**
     * Creates a form to delete a quizz_Complet entity.
     *
     * @param Quizz_Complet $quizz_Complet The quizz_Complet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Quizz_Complet $quizz_Complet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('quizz_complet_delete', array('id' => $quizz_Complet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
