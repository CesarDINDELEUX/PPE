<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurRepository")
 */
class Utilisateur extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="Mail", type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="Login", type="string", length=255, nullable=true)
     */
    private $login;



    /**
     * @var string
     *
     * @ORM\Column(name="IP", type="string", length=255,nullable=true)
     */
    private $iP;

    /**
     * @var string
     *
     * @ORM\Column(name="Port", type="string", length=255,nullable=true)
     */
    private $port;
    
    
     /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Reponse_Sondage", inversedBy="utilisateurs")
     * @ORM\JoinTable(name="reponse_utilisateur")
     */
    private $reponses_sondage;
    
         /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Reponse_Sequence", inversedBy="utilisateurs")
     * @ORM\JoinTable(name="reponse_sequence_utilisateur")
     */
    private $reponses_sequence;
    
    
        /**
     * Many Groups have Many Users.
     * @ORM\ManyToMany(targetEntity="Reponse_Quizz", mappedBy="utilisateurs")
     */
    private $reponses_quizz;

    
    
     /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Sondage_Complet", mappedBy="utilisateur")
     */
    private $sondages_termines;
    
    
         /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Quizz_Complet", mappedBy="utilisateur")
     */
    private $quizz_termines;

     /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Commentaire_Sondage", mappedBy="utilisateur")
     */
    private $commentaires_sondages;
    
         /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Commentaire_Quizz", mappedBy="utilisateur")
     */
    private $commentaires_quizz;
    
             /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Commentaire_Enquete", mappedBy="utilisateur")
     */
    private $commentaires_enquetes;
    
            public function __toString() 
          {
    return $this->nom;
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Utilisateur
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Utilisateur
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Utilisateur
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set iP
     *
     * @param string $iP
     *
     * @return Utilisateur
     */
    public function setIP($iP)
    {
        $this->iP = $iP;

        return $this;
    }

    /**
     * Get iP
     *
     * @return string
     */
    public function getIP()
    {
        return $this->iP;
    }

    /**
     * Set port
     *
     * @param string $port
     *
     * @return Utilisateur
     */
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Get port
     *
     * @return string
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set reponseUtilisateurSondage
     *
     * @param \AppBundle\Entity\Reponse_Sondage $reponseUtilisateurSondage
     *
     * @return Utilisateur
     */
    public function setReponseUtilisateurSondage(\AppBundle\Entity\Reponse_Sondage $reponseUtilisateurSondage = null)
    {
        $this->reponse_utilisateur_sondage = $reponseUtilisateurSondage;

        return $this;
    }

    /**
     * Get reponseUtilisateurSondage
     *
     * @return \AppBundle\Entity\Reponse_Sondage
     */
    public function getReponseUtilisateurSondage()
    {
        return $this->reponse_utilisateur_sondage;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reponses_sondage = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add reponsesSondage
     *
     * @param \AppBundle\Entity\Reponse_Sondage $reponsesSondage
     *
     * @return Utilisateur
     */
    public function addReponsesSondage(\AppBundle\Entity\Reponse_Sondage $reponsesSondage)
    {
        $this->reponses_sondage[] = $reponsesSondage;

        return $this;
    }

    /**
     * Remove reponsesSondage
     *
     * @param \AppBundle\Entity\Reponse_Sondage $reponsesSondage
     */
    public function removeReponsesSondage(\AppBundle\Entity\Reponse_Sondage $reponsesSondage)
    {
        $this->reponses_sondage->removeElement($reponsesSondage);
    }

    /**
     * Get reponsesSondage
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReponsesSondage()
    {
        return $this->reponses_sondage;
    }

    /**
     * Add sondagesTermine
     *
     * @param \AppBundle\Entity\Sondage_Complet $sondagesTermine
     *
     * @return Utilisateur
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
     * Add commentairesSondage
     *
     * @param \AppBundle\Entity\Commentaire_Sondage $commentairesSondage
     *
     * @return Utilisateur
     */
    public function addCommentairesSondage(\AppBundle\Entity\Commentaire_Sondage $commentairesSondage)
    {
        $this->commentaires_sondages[] = $commentairesSondage;

        return $this;
    }

    /**
     * Remove commentairesSondage
     *
     * @param \AppBundle\Entity\Commentaire_Sondage $commentairesSondage
     */
    public function removeCommentairesSondage(\AppBundle\Entity\Commentaire_Sondage $commentairesSondage)
    {
        $this->commentaires_sondages->removeElement($commentairesSondage);
    }

    /**
     * Get commentairesSondages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentairesSondages()
    {
        return $this->commentaires_sondages;
    }


    /**
     * Add quizzTermine
     *
     * @param \AppBundle\Entity\Quizz_Complet $quizzTermine
     *
     * @return Utilisateur
     */
    public function addQuizzTermine(\AppBundle\Entity\Quizz_Complet $quizzTermine)
    {
        $this->quizz_termines[] = $quizzTermine;

        return $this;
    }

    /**
     * Remove quizzTermine
     *
     * @param \AppBundle\Entity\Quizz_Complet $quizzTermine
     */
    public function removeQuizzTermine(\AppBundle\Entity\Quizz_Complet $quizzTermine)
    {
        $this->quizz_termines->removeElement($quizzTermine);
    }

    /**
     * Get quizzTermines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuizzTermines()
    {
        return $this->quizz_termines;
    }

    /**
     * Add commentairesQuizz
     *
     * @param \AppBundle\Entity\Commentaire_Quizz $commentairesQuizz
     *
     * @return Utilisateur
     */
    public function addCommentairesQuizz(\AppBundle\Entity\Commentaire_Quizz $commentairesQuizz)
    {
        $this->commentaires_quizz[] = $commentairesQuizz;

        return $this;
    }

    /**
     * Remove commentairesQuizz
     *
     * @param \AppBundle\Entity\Commentaire_Quizz $commentairesQuizz
     */
    public function removeCommentairesQuizz(\AppBundle\Entity\Commentaire_Quizz $commentairesQuizz)
    {
        $this->commentaires_quizz->removeElement($commentairesQuizz);
    }

    /**
     * Get commentairesQuizz
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentairesQuizz()
    {
        return $this->commentaires_quizz;
    }

    /**
     * Add reponsesQuizz
     *
     * @param \AppBundle\Entity\Reponse_Quizz $reponsesQuizz
     *
     * @return Utilisateur
     */
    public function addReponsesQuizz(\AppBundle\Entity\Reponse_Quizz $reponsesQuizz)
    {
        $this->reponses_quizz[] = $reponsesQuizz;

        return $this;
    }

    /**
     * Remove reponsesQuizz
     *
     * @param \AppBundle\Entity\Reponse_Quizz $reponsesQuizz
     */
    public function removeReponsesQuizz(\AppBundle\Entity\Reponse_Quizz $reponsesQuizz)
    {
        $this->reponses_quizz->removeElement($reponsesQuizz);
    }

    /**
     * Get reponsesQuizz
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReponsesQuizz()
    {
        return $this->reponses_quizz;
    }

    /**
     * Add reponsesSequence
     *
     * @param \AppBundle\Entity\Reponse_Sequence $reponsesSequence
     *
     * @return Utilisateur
     */
    public function addReponsesSequence(\AppBundle\Entity\Reponse_Sequence $reponsesSequence)
    {
        $this->reponses_sequence[] = $reponsesSequence;

        return $this;
    }

    /**
     * Remove reponsesSequence
     *
     * @param \AppBundle\Entity\Reponse_Sequence $reponsesSequence
     */
    public function removeReponsesSequence(\AppBundle\Entity\Reponse_Sequence $reponsesSequence)
    {
        $this->reponses_sequence->removeElement($reponsesSequence);
    }

    /**
     * Get reponsesSequence
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReponsesSequence()
    {
        return $this->reponses_sequence;
    }

    /**
     * Add commentairesSequence
     *
     * @param \AppBundle\Entity\Commentaire_Sequence $commentairesSequence
     *
     * @return Utilisateur
     */
    public function addCommentairesSequence(\AppBundle\Entity\Commentaire_Sequence $commentairesSequence)
    {
        $this->commentaires_sequences[] = $commentairesSequence;

        return $this;
    }

    /**
     * Remove commentairesSequence
     *
     * @param \AppBundle\Entity\Commentaire_Sequence $commentairesSequence
     */
    public function removeCommentairesSequence(\AppBundle\Entity\Commentaire_Sequence $commentairesSequence)
    {
        $this->commentaires_sequences->removeElement($commentairesSequence);
    }

    /**
     * Get commentairesSequences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentairesSequences()
    {
        return $this->commentaires_sequences;
    }

    /**
     * Add commentairesEnquete
     *
     * @param \AppBundle\Entity\Commentaire_Enquete $commentairesEnquete
     *
     * @return Utilisateur
     */
    public function addCommentairesEnquete(\AppBundle\Entity\Commentaire_Enquete $commentairesEnquete)
    {
        $this->commentaires_enquetes[] = $commentairesEnquete;

        return $this;
    }

    /**
     * Remove commentairesEnquete
     *
     * @param \AppBundle\Entity\Commentaire_Enquete $commentairesEnquete
     */
    public function removeCommentairesEnquete(\AppBundle\Entity\Commentaire_Enquete $commentairesEnquete)
    {
        $this->commentaires_enquetes->removeElement($commentairesEnquete);
    }

    /**
     * Get commentairesEnquetes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentairesEnquetes()
    {
        return $this->commentaires_enquetes;
    }
}
