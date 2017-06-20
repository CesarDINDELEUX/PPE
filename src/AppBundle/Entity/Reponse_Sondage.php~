<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse_Sondage
 *
 * @ORM\Table(name="reponse__sondage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Reponse_SondageRepository")
 */
class Reponse_Sondage
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
     * @ORM\ManyToOne(targetEntity="Question_Sondage", inversedBy="reponses_question")
     * @ORM\JoinColumn(name="question_reponse_id", referencedColumnName="id")
     */
    private $question_sondage;

    /**
     * Many Groups have Many Users.
     * @ORM\ManyToMany(targetEntity="Utilisateur", mappedBy="reponses_sondage")
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
     * @return Reponse_Sondage
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
     * Set questionSondage
     *
     * @param \AppBundle\Entity\Question_Sondage $questionSondage
     *
     * @return Reponse_Sondage
     */
    public function setQuestionSondage(\AppBundle\Entity\Question_Sondage $questionSondage = null)
    {
        $this->question_sondage = $questionSondage;

        return $this;
    }

    /**
     * Get questionSondage
     *
     * @return \AppBundle\Entity\Question_Sondage
     */
    public function getQuestionSondage()
    {
        return $this->question_sondage;
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
     * @return Reponse_Sondage
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
