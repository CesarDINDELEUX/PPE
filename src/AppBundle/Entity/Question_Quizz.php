<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question_Quizz
 *
 * @ORM\Table(name="question__quizz")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Question_QuizzRepository")
 */
class Question_Quizz
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Intitule", type="string", length=255)
     */
    private $intitule;


     /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Quizz", inversedBy="questions_quizz")
     * @ORM\JoinColumn(name="quizz_id", referencedColumnName="id")
     */
    private $quizz;
    
     /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Reponse_Quizz", mappedBy="question_quizz")
     */
    private $reponses_question;
    
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set intitule
     *
     * @param string $intitule
     *
     * @return Question_Quizz
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string
     */
    public function getIntitule()
    {
        return $this->intitule;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reponses_question = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set quizz
     *
     * @param \AppBundle\Entity\Quizz $quizz
     *
     * @return Question_Quizz
     */
    public function setQuizz(\AppBundle\Entity\Quizz $quizz = null)
    {
        $this->quizz = $quizz;

        return $this;
    }

    /**
     * Get quizz
     *
     * @return \AppBundle\Entity\Quizz
     */
    public function getQuizz()
    {
        return $this->quizz;
    }

    /**
     * Add reponsesQuestion
     *
     * @param \AppBundle\Entity\Reponse_Quizz $reponsesQuestion
     *
     * @return Question_Quizz
     */
    public function addReponsesQuestion(\AppBundle\Entity\Reponse_Quizz $reponsesQuestion)
    {
        $this->reponses_question[] = $reponsesQuestion;

        return $this;
    }

    /**
     * Remove reponsesQuestion
     *
     * @param \AppBundle\Entity\Reponse_Quizz $reponsesQuestion
     */
    public function removeReponsesQuestion(\AppBundle\Entity\Reponse_Quizz $reponsesQuestion)
    {
        $this->reponses_question->removeElement($reponsesQuestion);
    }

    /**
     * Get reponsesQuestion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReponsesQuestion()
    {
        return $this->reponses_question;
    }
}
