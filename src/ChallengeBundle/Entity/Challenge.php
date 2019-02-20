<?php

namespace ChallengeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Challenge
 *
 * @ORM\Table(name="challenge", indexes={@ORM\Index(name="idFreelancer", columns={"idFreelancer"}), @ORM\Index(name="idEntreprise", columns={"idEntreprise"})})
 * @ORM\Entity
 */
class Challenge
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;
    /**
     * @var integer
     *
     * @ORM\Column(name="phone", type="integer", length=255, nullable=false)
     */
    private $phone;
    /**
     * @var string
     *
     * @ORM\Column(name="specialite", type="string", length=255, nullable=false)
     */
    private $specialite;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Challenge
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
     * @return Challenge
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Challenge
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
     * Set email
     *
     * @param string $email
     *
     * @return Challenge
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return Challenge
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set specialite
     *
     * @param string $specialite
     *
     * @return Challenge
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get specialite
     *
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set identreprise
     *
     * @param \MyBundle\Entity\User $identreprise
     *
     * @return Challenge
     */
    public function setIdentreprise(\MyBundle\Entity\User $identreprise = null)
    {
        $this->identreprise = $identreprise;

        return $this;
    }

    /**
     * Get identreprise
     *
     * @return \MyBundle\Entity\User
     */
    public function getIdentreprise()
    {
        return $this->identreprise;
    }

    /**
     * Set idfreelancer
     *
     * @param \MyBundle\Entity\User $idfreelancer
     *
     * @return Challenge
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
