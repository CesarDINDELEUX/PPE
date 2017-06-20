<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quizz
 *
 * @ORM\Table(name="quizz")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuizzRepository")
 */
class Quizz
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
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Cadeau", mappedBy="sondage")
     */
    private $cadeaux;
    
         /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Commentaire_Quizz", mappedBy="quizz")
     */
    private $commentaires;

         /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Question_Quizz", mappedBy="quizz")
     */
    private $questions_quizz;
    
    
    
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
     * @return Quizz
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
        $this->cadeaux = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cadeaux
     *
     * @param \AppBundle\Entity\Cadeau $cadeaux
     *
     * @return Quizz
     */
    public function addCadeaux(\AppBundle\Entity\Cadeau $cadeaux)
    {
        $this->cadeaux[] = $cadeaux;

        return $this;
    }

    /**
     * Remove cadeaux
     *
     * @param \AppBundle\Entity\Cadeau $cadeaux
     */
    public function removeCadeaux(\AppBundle\Entity\Cadeau $cadeaux)
    {
        $this->cadeaux->removeElement($cadeaux);
    }

    /**
     * Get cadeaux
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCadeaux()
    {
        return $this->cadeaux;
    }

    /**
     * Add commentaire
     *
     * @param \AppBundle\Entity\Commentaire_Quizz $commentaire
     *
     * @return Quizz
     */
    public function addCommentaire(\AppBundle\Entity\Commentaire_Quizz $commentaire)
    {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \AppBundle\Entity\Commentaire_Quizz $commentaire
     */
    public function removeCommentaire(\AppBundle\Entity\Commentaire_Quizz $commentaire)
    {
        $this->commentaires->removeElement($commentaire);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Add questionsQuizz
     *
     * @param \AppBundle\Entity\Question_Quizz $questionsQuizz
     *
     * @return Quizz
     */
    public function addQuestionsQuizz(\AppBundle\Entity\Question_Quizz $questionsQuizz)
    {
        $this->questions_quizz[] = $questionsQuizz;

        return $this;
    }

    /**
     * Remove questionsQuizz
     *
     * @param \AppBundle\Entity\Question_Quizz $questionsQuizz
     */
    public function removeQuestionsQuizz(\AppBundle\Entity\Question_Quizz $questionsQuizz)
    {
        $this->questions_quizz->removeElement($questionsQuizz);
    }

    /**
     * Get questionsQuizz
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestionsQuizz()
    {
        return $this->questions_quizz;
    }
}
