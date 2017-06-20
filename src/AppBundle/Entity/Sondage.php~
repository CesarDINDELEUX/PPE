<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sondage
 *
 * @ORM\Table(name="sondage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SondageRepository")
 */
class Sondage
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
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Creation", type="date")
     */
    private $dateCreation;

    /**
     * @var bool
     *
     * @ORM\Column(name="isTermine", type="boolean", nullable=true)
     */
    private $isTermine;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Fin", type="date", nullable=true)
     */
    private $dateFin;

    
     /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Theme", inversedBy="sondages")
     * @ORM\JoinTable(name="sondage_theme")
     */
    private $themes;
    
     /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Question_Sondage", mappedBy="sondage")
     */
    private $questions_sondage;

    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Sondage_Complet", mappedBy="sondage")
     */
    private $sondages_termines;
    
     /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Commentaire_Sondage", mappedBy="sondage")
     */
    private $commentaires;
    
    
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
     * @return Sondage
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Sondage
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set isTermine
     *
     * @param boolean $isTermine
     *
     * @return Sondage
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
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Sondage
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->themes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->questions_sondage = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add theme
     *
     * @param \AppBundle\Entity\Theme $theme
     *
     * @return Sondage
     */
    public function addTheme(\AppBundle\Entity\Theme $theme)
    {
        $this->themes[] = $theme;

        return $this;
    }

    /**
     * Remove theme
     *
     * @param \AppBundle\Entity\Theme $theme
     */
    public function removeTheme(\AppBundle\Entity\Theme $theme)
    {
        $this->themes->removeElement($theme);
    }

    /**
     * Get themes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getThemes()
    {
        return $this->themes;
    }

    /**
     * Add questionsSondage
     *
     * @param \AppBundle\Entity\Question_Sondage $questionsSondage
     *
     * @return Sondage
     */
    public function addQuestionsSondage(\AppBundle\Entity\Question_Sondage $questionsSondage)
    {
        $this->questions_sondage[] = $questionsSondage;

        return $this;
    }

    /**
     * Remove questionsSondage
     *
     * @param \AppBundle\Entity\Question_Sondage $questionsSondage
     */
    public function removeQuestionsSondage(\AppBundle\Entity\Question_Sondage $questionsSondage)
    {
        $this->questions_sondage->removeElement($questionsSondage);
    }

    /**
     * Get questionsSondage
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestionsSondage()
    {
        return $this->questions_sondage;
    }

    /**
     * Add sondagesTermine
     *
     * @param \AppBundle\Entity\Sondage_Complet $sondagesTermine
     *
     * @return Sondage
     */
    public function addSondagesTermine(\AppBundle\Entity\Sondage_Complet $sondagesTermine)
    {
        $this->sondages_termines[] = $sondagesTermine;

        return $this;
    }

    /**
     * Remove sondagesTermine
     *
     * @param \AppBundle\Entity\Sondage_Complet $sondagesTermine
     */
    public function removeSondagesTermine(\AppBundle\Entity\Sondage_Complet $sondagesTermine)
    {
        $this->sondages_termines->removeElement($sondagesTermine);
    }

    /**
     * Get sondagesTermines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSondagesTermines()
    {
        return $this->sondages_termines;
    }

    /**
     * Add commentaire
     *
     * @param \AppBundle\Entity\Commentaire_Sondage $commentaire
     *
     * @return Sondage
     */
    public function addCommentaire(\AppBundle\Entity\Commentaire_Sondage $commentaire)
    {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \AppBundle\Entity\Commentaire_Sondage $commentaire
     */
    public function removeCommentaire(\AppBundle\Entity\Commentaire_Sondage $commentaire)
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
}
