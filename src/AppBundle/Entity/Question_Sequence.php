<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question_Sequence
 *
 * @ORM\Table(name="question__sequence")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Question_SequenceRepository")
 */
class Question_Sequence
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
     * @ORM\OneToMany(targetEntity="Reponse_Sequence", mappedBy="question_sequence")
     */
    private $reponses_question;
    
         /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Sequence", inversedBy="questions_sequence")
     * @ORM\JoinColumn(name="sequence_id", referencedColumnName="id")
     */
    private $sequence;


    public function __toString() {
    return $this->intitule;
}
    
    
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
     * @return Question_Sequence
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
     * Add reponsesQuestion
     *
     * @param \AppBundle\Entity\Reponse_Sequence $reponsesQuestion
     *
     * @return Question_Sequence
     */
    public function addReponsesQuestion(\AppBundle\Entity\Reponse_Sequence $reponsesQuestion)
    {
        $this->reponses_question[] = $reponsesQuestion;

        return $this;
    }

    /**
     * Remove reponsesQuestion
     *
     * @param \AppBundle\Entity\Reponse_Sequence $reponsesQuestion
     */
    public function removeReponsesQuestion(\AppBundle\Entity\Reponse_Sequence $reponsesQuestion)
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

    /**
     * Set sequence
     *
     * @param \AppBundle\Entity\Sequence $sequence
     *
     * @return Question_Sequence
     */
    public function setSequence(\AppBundle\Entity\Sequence $sequence = null)
    {
        $this->sequence = $sequence;

        return $this;
    }

    /**
     * Get sequence
     *
     * @return \AppBundle\Entity\Sequence
     */
    public function getSequence()
    {
        return $this->sequence;
    }
}
