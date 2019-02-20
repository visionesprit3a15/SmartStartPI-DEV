<?php

namespace ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="projet", indexes={@ORM\Index(name="idEntreprise", columns={"idEntreprise"})})
 * @ORM\Entity
 */
class Projet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="domaine", type="string", length=255, nullable=false)
     */
    private $domaine;

    /**
     * @var float
     *
     * @ORM\Column(name="budget", type="float", precision=10, scale=0, nullable=false)
     */
    private $budget;

    /**
     * @var string
     *
     * @ORM\Column(name="delai", type="string", length=255, nullable=false)
     */
    private $delai;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="MyBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEntreprise", referencedColumnName="id")
     * })
     */
    private $identreprise;

    /**
     * Get id
     *
     * @return integer
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
     * @return Projet
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
     * Set description
     *
     * @param string $description
     *
     * @return Projet
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set domaine
     *
     * @param string $domaine
     *
     * @return Projet
     */
    public function setDomaine($domaine)
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * Get domaine
     *
     * @return string
     */
    public function getDomaine()
    {
        return $this->domaine;
    }

    /**
     * Set budget
     *
     * @param float $budget
     *
     * @return Projet
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return float
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set delai
     *
     * @param string $delai
     *
     * @return Projet
     */
    public function setDelai($delai)
    {
        $this->delai = $delai;

        return $this;
    }

    /**
     * Get delai
     *
     * @return string
     */
    public function getDelai()
    {
        return $this->delai;
    }

    /**
     * Set identreprise
     *
     * @param \ProjetBundle\Entity\User $identreprise
     *
     * @return Projet
     */
    public function setIdentreprise(\ProjetBundle\Entity\User $identreprise = null)
    {
        $this->identreprise = $identreprise;

        return $this;
    }

    /**
     * Get identreprise
     *
     * @return \ProjetBundle\Entity\User
     */
    public function getIdentreprise()
    {
        return $this->identreprise;
    }
}
