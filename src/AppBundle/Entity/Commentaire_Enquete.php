<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire_Enquete
 *
 * @ORM\Table(name="commentaire__enquete")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Commentaire_EnqueteRepository")
 */
class Commentaire_Enquete
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
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="commentaires_enquetes")
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     */
    private $utilisateur;
    
       /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Enquete", inversedBy="commentaires")
     * @ORM\JoinColumn(name="enquete_id", referencedColumnName="id")
     */
    private $enquete;
    
    
    

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
     * @return Commentaire_Enquete
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
     * @return Commentaire_Enquete
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
     * Set sequence
     *
     * @param \AppBundle\Entity\Enquete $sequence
     *
     * @return Commentaire_Enquete
     */
    public function setSequence(\AppBundle\Entity\Enquete $sequence = null)
    {
        $this->sequence = $sequence;

        return $this;
    }

    /**
     * Get sequence
     *
     * @return \AppBundle\Entity\Enquete
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * Set enquete
     *
     * @param \AppBundle\Entity\Enquete $enquete
     *
     * @return Commentaire_Enquete
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
