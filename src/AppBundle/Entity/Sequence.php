<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sequence
 *
 * @ORM\Table(name="sequence")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SequenceRepository")
 */
class Sequence
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
     * @ORM\ManyToOne(targetEntity="Enquete", inversedBy="sequences")
     * @ORM\JoinColumn(name="enquete_id", referencedColumnName="id")
     */
    private $enquete;
    
    
     /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Question_Sequence", mappedBy="sequence")
     */
    private $questions_sequence;
    
        public function __toString() 
          {
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
     * @return Sequence
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
        $this->questions_sequence = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add questionsSequence
     *
     * @param \AppBundle\Entity\Question_Sequence $questionsSequence
     *
     * @return Sequence
     */
    public function addQuestionsSequence(\AppBundle\Entity\Question_Sequence $questionsSequence)
    {
        $this->questions_sequence[] = $questionsSequence;

        return $this;
    }

    /**
     * Remove questionsSequence
     *
     * @param \AppBundle\Entity\Question_Sequence $questionsSequence
     */
    public function removeQuestionsSequence(\AppBundle\Entity\Question_Sequence $questionsSequence)
    {
        $this->questions_sequence->removeElement($questionsSequence);
    }

    /**
     * Get questionsSequence
     *
     * @return \Doctrine\Common\Collections\Collection
     */
   public function getQuestionsSequence()
    {
        return $this->questions_sequence;
    }

    /**
     * Set enquete
     *
     * @param \AppBundle\Entity\Enquete $enquete
     *
     * @return Sequence
     */
    public function setEnquete(\AppBundle\Entity\Enquete $enquete = null)
    {
        $this->enquete = $enquete;

        return $this;
    }

    /**
     * Get enquete
     *
     * @return \AppBundle\Entity\Enquete
     */
    public function getEnquete()
    {
        return $this->enquete;
    }
}
