<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question_Sondage
 *
 * @ORM\Table(name="question__sondage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Question_SondageRepository")
 */
class Question_Sondage
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
     * @ORM\ManyToOne(targetEntity="Sondage", inversedBy="questions_sondage")
     * @ORM\JoinColumn(name="sondage_id", referencedColumnName="id")
     */
    private $sondage;
    
     /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Reponse_Sondage", mappedBy="question_sondage")
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
     * @return Question_Sondage
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
     * Set sondage
     *
     * @param \AppBundle\Entity\Sondage $sondage
     *
     * @return Question_Sondage
     */
    public function setSondage(\AppBundle\Entity\Sondage $sondage = null)
    {
        $this->sondage = $sondage;

        return $this;
    }

    /**
     * Get sondage
     *
     * @return \AppBundle\Entity\Sondage
     */
    public function getSondage()
    {
        return $this->sondage;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reponses_question = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add reponsesQuestion
     *
     * @param \AppBundle\Entity\Reponse_Sondage $reponsesQuestion
     *
     * @return Question_Sondage
     */
    public function addReponsesQuestion(\AppBundle\Entity\Reponse_Sondage $reponsesQuestion)
    {
        $this->reponses_question[] = $reponsesQuestion;

        return $this;
    }

    /**
     * Remove reponsesQuestion
     *
     * @param \AppBundle\Entity\Reponse_Sondage $reponsesQuestion
     */
    public function removeReponsesQuestion(\AppBundle\Entity\Reponse_Sondage $reponsesQuestion)
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
