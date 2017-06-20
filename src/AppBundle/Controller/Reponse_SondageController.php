<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reponse_Sondage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Reponse_sondage controller.
 *
 * @Route("reponse_sondage")
 */
class Reponse_SondageController extends Controller
{
    /**
     * Lists all reponse_Sondage entities.
     *
     * @Route("/", name="reponse_sondage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reponse_Sondages = $em->getRepository('AppBundle:Reponse_Sondage')->findAll();

        return $this->render('reponse_sondage/index.html.twig', array(
            'reponse_Sondages' => $reponse_Sondages,
        ));
    }

    /**
     * Creates a new reponse_Sondage entity.
     *
     * @Route("/new", name="reponse_sondage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reponse_Sondage = new Reponse_sondage();
        $form = $this->createForm('AppBundle\Form\Reponse_SondageType', $reponse_Sondage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reponse_Sondage);
            $em->flush();

            return $this->redirectToRoute('reponse_sondage_show', array('id' => $reponse_Sondage->getId()));
        }

        return $this->render('reponse_sondage/new.html.twig', array(
            'reponse_Sondage' => $reponse_Sondage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reponse_Sondage entity.
     *
     * @Route("/{id}", name="reponse_sondage_show")
     * @Method("GET")
     */
    public function showAction(Reponse_Sondage $reponse_Sondage)
    {
        $deleteForm = $this->createDeleteForm($reponse_Sondage);

        return $this->render('reponse_sondage/show.html.twig', array(
            'reponse_Sondage' => $reponse_Sondage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reponse_Sondage entity.
     *
     * @Route("/{id}/edit", name="reponse_sondage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reponse_Sondage $reponse_Sondage)
    {
        $deleteForm = $this->createDeleteForm($reponse_Sondage);
        $editForm = $this->createForm('AppBundle\Form\Reponse_SondageType', $reponse_Sondage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reponse_sondage_edit', array('id' => $reponse_Sondage->getId()));
        }

        return $this->render('reponse_sondage/edit.html.twig', array(
            'reponse_Sondage' => $reponse_Sondage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reponse_Sondage entity.
     *
     * @Route("/{id}", name="reponse_sondage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reponse_Sondage $reponse_Sondage)
    {
        $form = $this->createDeleteForm($reponse_Sondage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reponse_Sondage);
            $em->flush();
        }

        return $this->redirectToRoute('reponse_sondage_index');
    }

    /**
     * Creates a form to delete a reponse_Sondage entity.
     *
     * @param Reponse_Sondage $reponse_Sondage The reponse_Sondage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reponse_Sondage $reponse_Sondage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reponse_sondage_delete', array('id' => $reponse_Sondage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
