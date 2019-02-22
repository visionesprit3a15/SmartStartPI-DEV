<?php

namespace OffreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre", indexes={@ORM\Index(name="idProjet", columns={"idProjet"}), @ORM\Index(name="idFreelancer", columns={"idFreelancer"})})
 * @ORM\Entity
 */
class Offre

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
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var \Projet
     *
     * @ORM\ManyToOne(targetEntity="ProjetBundle\Entity\Projet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProjet", referencedColumnName="id")
     * })
     */
    private $idprojet;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="MyBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFreelancer", referencedColumnName="id")
     * })
     */
    private $idfreelancer;



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
     * Set description
     *
     * @param string $description
     *
     * @return Offre
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
     * Set prix
     *
     * @param float $prix
     *
     * @return Offre
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set idprojet
     *
     * @param \OffreBundle\Entity\Projet $idprojet
     *
     * @return Offre
     */
    public function setIdprojet(\OffreBundle\Entity\Projet $idprojet = null)
    {
        $this->idprojet = $idprojet;

        return $this;
    }

    /**
     * Get idprojet
     *
     * @return \OffreBundle\Entity\Projet
     */
    public function getIdprojet()
    {
        return $this->idprojet;
    }

    /**
     * Set idfreelancer
     *
     * @param \MyBundle\Entity\User $idfreelancer
     *
     * @return Offre
     */
    public function setIdfreelancer(\MyBundle\Entity\User $idfreelancer = null)
    {
        $this->idfreelancer = $idfreelancer;

        return $this;
    }

    /**
     * Get idfreelancer
     *
     * @return \MyBundle\Entity\User
     */
    public function getIdfreelancer()
    {
        return $this->idfreelancer;
    }
}
