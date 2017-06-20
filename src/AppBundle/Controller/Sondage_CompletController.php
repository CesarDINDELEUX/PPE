<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sondage_Complet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sondage_complet controller.
 *
 * @Route("sondage_complet")
 */
class Sondage_CompletController extends Controller
{
    /**
     * Lists all sondage_Complet entities.
     *
     * @Route("/", name="sondage_complet_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sondage_Complets = $em->getRepository('AppBundle:Sondage_Complet')->findAll();

        return $this->render('sondage_complet/index.html.twig', array(
            'sondage_Complets' => $sondage_Complets,
        ));
    }

    /**
     * Creates a new sondage_Complet entity.
     *
     * @Route("/new", name="sondage_complet_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sondage_Complet = new Sondage_complet();
        $form = $this->createForm('AppBundle\Form\Sondage_CompletType', $sondage_Complet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sondage_Complet);
            $em->flush();

            return $this->redirectToRoute('sondage_complet_show', array('id' => $sondage_Complet->getId()));
        }

        return $this->render('sondage_complet/new.html.twig', array(
            'sondage_Complet' => $sondage_Complet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sondage_Complet entity.
     *
     * @Route("/{id}", name="sondage_complet_show")
     * @Method("GET")
     */
    public function showAction(Sondage_Complet $sondage_Complet)
    {
        $deleteForm = $this->createDeleteForm($sondage_Complet);

        return $this->render('sondage_complet/show.html.twig', array(
            'sondage_Complet' => $sondage_Complet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sondage_Complet entity.
     *
     * @Route("/{id}/edit", name="sondage_complet_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sondage_Complet $sondage_Complet)
    {
        $deleteForm = $this->createDeleteForm($sondage_Complet);
        $editForm = $this->createForm('AppBundle\Form\Sondage_CompletType', $sondage_Complet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sondage_complet_edit', array('id' => $sondage_Complet->getId()));
        }

        return $this->render('sondage_complet/edit.html.twig', array(
            'sondage_Complet' => $sondage_Complet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sondage_Complet entity.
     *
     * @Route("/{id}", name="sondage_complet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sondage_Complet $sondage_Complet)
    {
        $form = $this->createDeleteForm($sondage_Complet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sondage_Complet);
            $em->flush();
        }

        return $this->redirectToRoute('sondage_complet_index');
    }

    /**
     * Creates a form to delete a sondage_Complet entity.
     *
     * @param Sondage_Complet $sondage_Complet The sondage_Complet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sondage_Complet $sondage_Complet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sondage_complet_delete', array('id' => $sondage_Complet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
