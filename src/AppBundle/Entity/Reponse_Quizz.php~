<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse_Quizz
 *
 * @ORM\Table(name="reponse__quizz")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Reponse_QuizzRepository")
 */
class Reponse_Quizz
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
     * @ORM\ManyToOne(targetEntity="Question_Quizz", inversedBy="reponses_question")
     * @ORM\JoinColumn(name="question_reponse_id", referencedColumnName="id")
     */
    private $question_quizz;

        /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Utilisateur", inversedBy="reponses_quizz")
     * @ORM\JoinTable(name="reponses_quizz")
     */
    private $utilisateurs;

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
     * @return Reponse_Quizz
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
     * Set questionQuizz
     *
     * @param \AppBundle\Entity\Question_Quizz $questionQuizz
     *
     * @return Reponse_Quizz
     */
    public function setQuestionQuizz(\AppBundle\Entity\Question_Quizz $questionQuizz = null)
    {
        $this->question_quizz = $questionQuizz;

        return $this;
    }

    /**
     * Get questionQuizz
     *
     * @return \AppBundle\Entity\Question_Quizz
     */
    public function getQuestionQuizz()
    {
        return $this->question_quizz;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->utilisateurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add utilisateur
     *
     * @param \AppBundle\Entity\Utilisateurs $utilisateur
     *
     * @return Reponse_Quizz
     */
    public function addUtilisateur(\AppBundle\Entity\Utilisateurs $utilisateur)
    {
        $this->utilisateurs[] = $utilisateur;

        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param \AppBundle\Entity\Utilisateurs $utilisateur
     */
    public function removeUtilisateur(\AppBundle\Entity\Utilisateurs $utilisateur)
    {
        $this->utilisateurs->removeElement($utilisateur);
    }

    /**
     * Get utilisateurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }
}
