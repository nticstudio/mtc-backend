<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 * @ApiResource()
 * @Gedmo\SoftDeleteable()
 */
class Patient
{

    use TimestampableEntity;
    use SoftDeleteableEntity;
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("consult")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("consult")     
     */
    private $lastname;

    /**
     * @ORM\Column(type="smallint")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $situationfam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $paysnai;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nbenfant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profession;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tabac;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $alcool;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sport;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $medication;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $protese;

    /**
     * @ORM\OneToMany(targetEntity=Consult::class, mappedBy="patient")
     */
    private $consults;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="patients")
     */
    private $createdBy;

    public function __construct()
    {
        $this->consults = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }



    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getSituationfam(): ?string
    {
        return $this->situationfam;
    }

    public function setSituationfam(?string $situationfam): self
    {
        $this->situationfam = $situationfam;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPaysnai(): ?string
    {
        return $this->paysnai;
    }

    public function setPaysnai(?string $paysnai): self
    {
        $this->paysnai = $paysnai;

        return $this;
    }

    public function getNbenfant(): ?int
    {
        return $this->nbenfant;
    }

    public function setNbenfant(int $nbenfant): self
    {
        $this->nbenfant = $nbenfant;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getTabac(): ?bool
    {
        return $this->tabac;
    }

    public function setTabac(?bool $tabac): self
    {
        $this->tabac = $tabac;

        return $this;
    }

    public function getAlcool(): ?bool
    {
        return $this->alcool;
    }

    public function setAlcool(?bool $alcool): self
    {
        $this->alcool = $alcool;

        return $this;
    }

    public function getSport(): ?string
    {
        return $this->sport;
    }

    public function setSport(?string $sport): self
    {
        $this->sport = $sport;

        return $this;
    }

    public function getMedication(): ?string
    {
        return $this->medication;
    }

    public function setMedication(?string $medication): self
    {
        $this->medication = $medication;

        return $this;
    }

    public function getProtese(): ?string
    {
        return $this->protese;
    }

    public function setProtese(?string $protese): self
    {
        $this->protese = $protese;

        return $this;
    }

    /**
     * @return Collection|Consult[]
     */
    public function getConsults(): Collection
    {
        return $this->consults;
    }

    public function addConsult(Consult $consult): self
    {
        if (!$this->consults->contains($consult)) {
            $this->consults[] = $consult;
            $consult->setPatient($this);
        }

        return $this;
    }

    public function removeConsult(Consult $consult): self
    {
        if ($this->consults->removeElement($consult)) {
            // set the owning side to null (unless already changed)
            if ($consult->getPatient() === $this) {
                $consult->setPatient(null);
            }
        }

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    
}
