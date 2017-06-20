<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire_Sondage
 *
 * @ORM\Table(name="commentaire__sondage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Commentaire_SondageRepository")
 */
class Commentaire_Sondage
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
     * @ORM\Column(name="Commentaire", type="text")
     */
    private $commentaire;


        /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date")
     */
    private $date;
    
    
       /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="commentaires_sondages")
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     */
    private $utilisateur;
    
       /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Sondage", inversedBy="commentaires")
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
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Commentaire_Sondage
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
    
        /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Commentaire_Quizz
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
     * Set utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Commentaire_Sondage
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
     * @return Commentaire_Sondage
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
