<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Enquete;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
/**
 * Enquete controller.
 *
 * @Route("enquete")
 */
class EnqueteController extends Controller {

    /**
     * Lists all enquete entities.
     *
     * @Route("/", name="enquete_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $enquetes = $em->getRepository('AppBundle:Enquete')->findAll();

        return $this->render('enquete/index.html.twig', array(
                    'enquetes' => $enquetes,
        ));
    }

    /**
     * Creates a new enquete entity.
     *
     * @Route("/new", name="enquete_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $enquete = new Enquete();
        $form = $this->createForm('AppBundle\Form\EnqueteType', $enquete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($enquete);
            $em->flush();

            return $this->redirectToRoute('enquete_show', array('id' => $enquete->getId()));
        }

        return $this->render('enquete/new.html.twig', array(
                    'enquete' => $enquete,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a enquete entity.
     *
     * @Route("/repondre/", name="enregistrerReponseSequence")
     * @Method({"POST"})
     */
    public function enregistrerReponseSequence(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $listereponse = $request->request->all();
        $idenquete = 0;
        
        
        
        $user = $this->getUser();

        foreach ($listereponse as $lareponse) {
            $reponse = $em->getRepository("AppBundle:Reponse_Sequence")->find($lareponse);
            $question = $reponse->getQuestionSequence();
            $sequence = $question->getSequence();
            $enquete = $sequence->getEnquete();
            $idenquete = $enquete->getId();
            $user->addReponsesSequence($reponse);
        }
        $em->flush();
       return $this->redirect($this->generateUrl('enquete_repondre', array('id' => $idenquete)));
        
    }

    /**
     * Finds and displays a enquete entity.
     *
     * @Route("/repondre/{id}", name="enquete_repondre")
     * @Method({"GET", "POST"})
     */
    public function repondre(Enquete $enquete, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        if ($user == null) {
            return $this->render('enquete/repondre.html.twig'
            );
        } else {
            $userrep = $user->getReponsesSequence();
            $k = 1;
            $arrayQuestions[0] = 0;
            foreach ($userrep as $toutereponses) {
                $laquestion = $toutereponses->getQuestionSequence();
                $idquestion = $laquestion->getId();

                $arrayQuestions[$k] = $idquestion;
                $k = $k + 1;
            }



            $reponseForm = $this->createForm('AppBundle\Form\ReponseFormType', $enquete);
            $reponseForm->handleRequest($request);
            $sequences = $enquete->getSequences();
            $nbrrep = $em->getRepository("AppBundle:Enquete")->createQueryBuilder('trs')
                    ->Join("trs.sequences", "q")
                    ->Join("q.questions_sequence", "r")
                    ->Join("r.reponses_question", "p")
                    ->leftJoin("p.utilisateurs", "urs")
                    ->groupBy("p.id")
                    ->select("Count(urs) as nbr, r.id, p.intitule")
                    ->where("trs.id = :id")
                    ->setParameter("id", $enquete->getId())
                    ->getQuery()
                    ->getResult();

            $i = 0;
            $id = 0;
            foreach ($nbrrep as $rep) {
                if ($id != $rep["id"]) {
                    $id = $rep["id"];
                    $i = 0;
                    $questions[$id][0] = $rep["id"];
                }
                $questions[$id][1][$i] = $rep["intitule"];
                $questions[$id][2][$i] = $rep["nbr"];
                $a = mt_rand(0, 255);
                $b = mt_rand(0, 255);
                $c = mt_rand(0, 255);
                $questions[$id][3][$i] = 'rgba(' . $a . ',' . $b . ',' . $c . ', 0.4)';
                $questions[$id][4][$i] = 'rgba(' . $a . ',' . $b . ',' . $c . ', 1)';
                $i++;
            }

            return $this->render('enquete/repondre.html.twig', array(
                        'enquete' => $enquete,
                        'nbrrep' => $questions,
                        'arrayquest' => $arrayQuestions,
                        'delete_form' => $reponseForm->createView(),
            ));
        }
    }

    /**
     * Finds and displays a enquete entity.
     *
     * @Route("/{id}", name="enquete_show")
     * @Method("GET")
     */
    public function showAction(Enquete $enquete) {
        $deleteForm = $this->createDeleteForm($enquete);

        return $this->render('enquete/show.html.twig', array(
                    'enquete' => $enquete,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing enquete entity.
     *
     * @Route("/{id}/edit", name="enquete_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Enquete $enquete) {
        $deleteForm = $this->createDeleteForm($enquete);
        $editForm = $this->createForm('AppBundle\Form\EnqueteType', $enquete);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('enquete_edit', array('id' => $enquete->getId()));
        }

        return $this->render('enquete/edit.html.twig', array(
                    'enquete' => $enquete,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a enquete entity.
     *
     * @Route("/{id}", name="enquete_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Enquete $enquete) {
        $form = $this->createDeleteForm($enquete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($enquete);
            $em->flush();
        }

        return $this->redirectToRoute('enquete_index');
    }

    /**
     * Creates a form to delete a enquete entity.
     *
     * @param Enquete $enquete The enquete entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Enquete $enquete) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('enquete_delete', array('id' => $enquete->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
