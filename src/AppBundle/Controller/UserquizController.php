<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Question_Quizz;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Userquiz controller.
 */
class UserquizController extends Controller
{
    /**
    * @Route("/userquiz", name="userquiz_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $questionsdata = $em->createQuery('Select q.id as questionId, q.intitule as question from question_sequence LIMIT 0, 1 order by rand');
		
		foreach($questionsdata as $value)
		{
			//get the answers 
			$ansdata = $em->createQuery('Select r.intitule as options from response_sequence where r.question_response_id = '.$value['questionId']);
			foreach($ansdata as $ans)
			{
				 $questionsdata['answers'][] =  $ans['options'];
			}
		}
		
		//get t

        return $this->render('userquiz/index.html.twig', array(
            'questionsdata' => $questionsdata,
        ));
    }
}
