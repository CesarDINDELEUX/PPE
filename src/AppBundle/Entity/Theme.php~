<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Theme
 *
 * @ORM\Table(name="theme")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ThemeRepository")
 */
class Theme
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
     * @ORM\Column(name="Intutile", type="string", length=255)
     */
    private $intutile;


     /**
     * Des themes ont des sous themes.
     * @ORM\ManyToMany(targetEntity="Theme", inversedBy="themes")
     * @ORM\JoinTable(name="theme_theme")
     */
    private $themes;
    
    
    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Enquete", mappedBy="theme")
     */
    private $enquetes;
    
    /**
     * Many Groups have Many Users.
     * @ORM\ManyToMany(targetEntity="Sondage", mappedBy="themes")
     */
    private $sondages;
    
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
     * Set intutile
     *
     * @param string $intutile
     *
     * @return Theme
     */
    public function setIntutile($intutile)
    {
        $this->intutile = $intutile;

        return $this;
    }

    /**
     * Get intutile
     *
     * @return string
     */
    public function getIntutile()
    {
        return $this->intutile;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->themes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->enquetes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add theme
     *
     * @param \AppBundle\Entity\Theme $theme
     *
     * @return Theme
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
     * Add enquete
     *
     * @param \AppBundle\Entity\Enquete $enquete
     *
     * @return Theme
     */
    public function addEnquete(\AppBundle\Entity\Enquete $enquete)
    {
        $this->enquetes[] = $enquete;

        return $this;
    }

    /**
     * Remove enquete
     *
     * @param \AppBundle\Entity\Enquete $enquete
     */
    public function removeEnquete(\AppBundle\Entity\Enquete $enquete)
    {
        $this->enquetes->removeElement($enquete);
    }

    /**
     * Get enquetes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnquetes()
    {
        return $this->enquetes;
    }

    /**
     * Add sondage
     *
     * @param \AppBundle\Entity\Sondage $sondage
     *
     * @return Theme
     */
    public function addSondage(\AppBundle\Entity\Sondage $sondage)
    {
        $this->sondages[] = $sondage;

        return $this;
    }

    /**
     * Remove sondage
     *
     * @param \AppBundle\Entity\Sondage $sondage
     */
    public function removeSondage(\AppBundle\Entity\Sondage $sondage)
    {
        $this->sondages->removeElement($sondage);
    }

    /**
     * Get sondages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSondages()
    {
        return $this->sondages;
    }
}
