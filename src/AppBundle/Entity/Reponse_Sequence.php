<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse_Sequence
 *
 * @ORM\Table(name="reponse__sequence")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Reponse_SequenceRepository")
 */
class Reponse_Sequence
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
     * @ORM\ManyToOne(targetEntity="Question_Sequence", inversedBy="reponses_question")
     * @ORM\JoinColumn(name="question_reponse_id", referencedColumnName="id")
     */
    private $question_sequence;
    
    
     /**
     * Many Groups have Many Users.
     * @ORM\ManyToMany(targetEntity="Utilisateur", mappedBy="reponses_sequence")
     */
    private $utilisateurs;
    
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
     * @return Reponse_Sequence
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
     * Set questionSequence
     *
     * @param \AppBundle\Entity\Question_Sequence $questionSequence
     *
     * @return Reponse_Sequence
     */
    public function setQuestionSequence(\AppBundle\Entity\Question_Sequence $questionSequence = null)
    {
        $this->question_sequence = $questionSequence;

        return $this;
    }

    /**
     * Get questionSequence
     *
     * @return \AppBundle\Entity\Question_Sequence
     */
    public function getQuestionSequence()
    {
        return $this->question_sequence;
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
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Reponse_Sequence
     */
    public function addUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateurs[] = $utilisateur;

        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     */
    public function removeUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur)
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
