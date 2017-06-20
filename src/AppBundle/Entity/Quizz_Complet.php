<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quizz_Complet
 *
 * @ORM\Table(name="quizz__complet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Quizz_CompletRepository")
 */
class Quizz_Complet
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
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date")
     */
    private $date;

    /**
     * @var bool
     *
     * @ORM\Column(name="QuizzTermine", type="boolean", nullable=true)
     */
    private $quizzTermine;
    
    
       /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="quizz_termines")
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     */
    private $utilisateur;
    
       /**
     * Many Features have One Product.
 * @ORM\ManyToOne(targetEntity="Quizz", inversedBy="quizz_termines")
     * @ORM\JoinColumn(name="quizz_id", referencedColumnName="id")
     */
    private $quizz;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Quizz_Complet
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set quizzTermine
     *
     * @param boolean $quizzTermine
     *
     * @return Quizz_Complet
     */
    public function setQuizzTermine($quizzTermine)
    {
        $this->quizzTermine = $quizzTermine;

        return $this;
    }

    /**
     * Get quizzTermine
     *
     * @return bool
     */
    public function getQuizzTermine()
    {
        return $this->quizzTermine;
    }

    /**
     * Set utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Quizz_Complet
     */
    public function setUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set quizz
     *
     * @param \AppBundle\Entity\Quizz $quizz
     *
     * @return Quizz_Complet
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
}
