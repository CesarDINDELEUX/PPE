<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cadeau;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cadeau controller.
 *
 * @Route("cadeau")
 */
class CadeauController extends Controller
{
    /**
     * Lists all cadeau entities.
     *
     * @Route("/", name="cadeau_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cadeaus = $em->getRepository('AppBundle:Cadeau')->findAll();

        return $this->render('cadeau/index.html.twig', array(
            'cadeaus' => $cadeaus,
        ));
    }

    /**
     * Creates a new cadeau entity.
     *
     * @Route("/new", name="cadeau_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cadeau = new Cadeau();
        $form = $this->createForm('AppBundle\Form\CadeauType', $cadeau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cadeau);
            $em->flush();

            return $this->redirectToRoute('cadeau_show', array('id' => $cadeau->getId()));
        }

        return $this->render('cadeau/new.html.twig', array(
            'cadeau' => $cadeau,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cadeau entity.
     *
     * @Route("/{id}", name="cadeau_show")
     * @Method("GET")
     */
    public function showAction(Cadeau $cadeau)
    {
        $deleteForm = $this->createDeleteForm($cadeau);

        return $this->render('cadeau/show.html.twig', array(
            'cadeau' => $cadeau,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cadeau entity.
     *
     * @Route("/{id}/edit", name="cadeau_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cadeau $cadeau)
    {
        $deleteForm = $this->createDeleteForm($cadeau);
        $editForm = $this->createForm('AppBundle\Form\CadeauType', $cadeau);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cadeau_edit', array('id' => $cadeau->getId()));
        }

        return $this->render('cadeau/edit.html.twig', array(
            'cadeau' => $cadeau,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cadeau entity.
     *
     * @Route("/{id}", name="cadeau_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cadeau $cadeau)
    {
        $form = $this->createDeleteForm($cadeau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cadeau);
            $em->flush();
        }

        return $this->redirectToRoute('cadeau_index');
    }

    /**
     * Creates a form to delete a cadeau entity.
     *
     * @param Cadeau $cadeau The cadeau entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cadeau $cadeau)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cadeau_delete', array('id' => $cadeau->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
