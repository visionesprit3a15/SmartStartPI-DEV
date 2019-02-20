<?php

namespace DemandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande", indexes={@ORM\Index(name="idMission", columns={"idMission"}), @ORM\Index(name="idFreelancer", columns={"idFreelancer"})})
 * @ORM\Entity
 */
class Demande
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
     * @var \Mission
     *
     * @ORM\ManyToOne(targetEntity="MissionBundle\Entity\Mission")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMission", referencedColumnName="id")
     * })
     */
    private $idmission;

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
     * @return Demande
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
     * @return Demande
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
     * Set idmission
     *
     * @param \MissionBundle\Entity\Mission $idmission
     *
     * @return Demande
     */
    public function setIdmission(\MissionBundle\Entity\Mission $idmission = null)
    {
        $this->idmission = $idmission;

        return $this;
    }

    /**
     * Get idmission
     *
     * @return mixed
     */
    public function getIdmission()
    {
        return $this->idmission;
    }

    

    /**
     * Set idfreelancer
     *
     * @param \MyBundle\Entity\User $idfreelancer
     *
     * @return Demande
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
