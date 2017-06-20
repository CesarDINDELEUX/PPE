<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reponse_Sequence;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Reponse_sequence controller.
 *
 * @Route("reponse_sequence")
 */
class Reponse_SequenceController extends Controller
{
    /**
     * Lists all reponse_Sequence entities.
     *
     * @Route("/", name="reponse_sequence_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reponse_Sequences = $em->getRepository('AppBundle:Reponse_Sequence')->findAll();

        return $this->render('reponse_sequence/index.html.twig', array(
            'reponse_Sequences' => $reponse_Sequences,
        ));
    }

    /**
     * Creates a new reponse_Sequence entity.
     *
     * @Route("/new", name="reponse_sequence_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reponse_Sequence = new Reponse_sequence();
        $form = $this->createForm('AppBundle\Form\Reponse_SequenceType', $reponse_Sequence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reponse_Sequence);
            $em->flush();

            return $this->redirectToRoute('reponse_sequence_show', array('id' => $reponse_Sequence->getId()));
        }

        return $this->render('reponse_sequence/new.html.twig', array(
            'reponse_Sequence' => $reponse_Sequence,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reponse_Sequence entity.
     *
     * @Route("/{id}", name="reponse_sequence_show")
     * @Method("GET")
     */
    public function showAction(Reponse_Sequence $reponse_Sequence)
    {
        $deleteForm = $this->createDeleteForm($reponse_Sequence);

        return $this->render('reponse_sequence/show.html.twig', array(
            'reponse_Sequence' => $reponse_Sequence,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reponse_Sequence entity.
     *
     * @Route("/{id}/edit", name="reponse_sequence_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reponse_Sequence $reponse_Sequence)
    {
        $deleteForm = $this->createDeleteForm($reponse_Sequence);
        $editForm = $this->createForm('AppBundle\Form\Reponse_SequenceType', $reponse_Sequence);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reponse_sequence_edit', array('id' => $reponse_Sequence->getId()));
        }

        return $this->render('reponse_sequence/edit.html.twig', array(
            'reponse_Sequence' => $reponse_Sequence,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reponse_Sequence entity.
     *
     * @Route("/{id}", name="reponse_sequence_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reponse_Sequence $reponse_Sequence)
    {
        $form = $this->createDeleteForm($reponse_Sequence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reponse_Sequence);
            $em->flush();
        }

        return $this->redirectToRoute('reponse_sequence_index');
    }

    /**
     * Creates a form to delete a reponse_Sequence entity.
     *
     * @param Reponse_Sequence $reponse_Sequence The reponse_Sequence entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reponse_Sequence $reponse_Sequence)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reponse_sequence_delete', array('id' => $reponse_Sequence->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
