<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sondage_Complet
 *
 * @ORM\Table(name="sondage__complet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Sondage_CompletRepository")
 */
class Sondage_Complet
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
     * @ORM\Column(name="isTermine", type="boolean", nullable=true)
     */
    private $isTermine;
    
    
   /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="sondages_termines")
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     */
    private $utilisateur;
    
       /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Sondage", inversedBy="sondages_termines")
     * @ORM\JoinColumn(name="sondage_id", referencedColumnName="id")
     */
    private $sondage;


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
     * @return Sondage_Complet
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
     * Set isTermine
     *
     * @param boolean $isTermine
     *
     * @return Sondage_Complet
     */
    public function setIsTermine($isTermine)
    {
        $this->isTermine = $isTermine;

        return $this;
    }

    /**
     * Get isTermine
     *
     * @return bool
     */
    public function getIsTermine()
    {
        return $this->isTermine;
    }

    /**
     * Set utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Sondage_Complet
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
     * Set sondage
     *
     * @param \AppBundle\Entity\Sondage $sondage
     *
     * @return Sondage_Complet
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
}
