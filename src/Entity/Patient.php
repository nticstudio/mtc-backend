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
 * @ApiResource(
 *      normalizationContext={"groups"={"read:patients"}} ,
 *      itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"read:patients","read:patient","write:patient"}}
 *           },
 *        "put"={},
 *        "delete"={},
 *      }
 * )
 * @Gedmo\SoftDeleteable()
 */
class Patient
{

    use SoftDeleteableEntity;
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:patients","read:consults","read:user"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180)
     * @Groups({"read:patients","read:user"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:patients","read:consults","read:user"})
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:patients","read:consults","read:user"})
     */
    private $lastname;

    /**
     * @ORM\Column(type="smallint")
     * @Groups({"read:patient"})
     */
    private $age;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     *  @Groups({"read:patient"})
     */
    private $situationfam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:patients","read:user"})
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:patient"})
     */
    private $paysnai;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"read:patient"})
     */
    private $nbenfant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:patient"})
     */
    private $profession;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:patient"})
     */
    private $tabac;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:patient"})
     */
    private $alcool;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:patient"})
     */
    private $sport;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:patient"})
     */
    private $medication;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:patient"})
     */
    private $protese;

    /**
     * @ORM\OneToMany(targetEntity=Consult::class, mappedBy="patient")
     */
    private $consults;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="patients")
     * @Groups({"read:patient"})
     */
    private $createdBy;

     /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     * @Groups({"read:patients","write:patient","read:user"})
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     * @Groups({"read:patient"})
     */
    protected $updatedAt;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"read:patient"})
     */
    private $genre;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:patient"})
     */
    private $enceinte;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:patient"})
     */
    private $pillule;


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

    public function getSituationfam(): ?int
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


    /**
     * Sets createdAt.
     *
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Returns createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets updatedAt.
     *
     * @return $this
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Returns updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getGenre(): ?int
    {
        return $this->genre;
    }

    public function setGenre(?int $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getEnceinte(): ?bool
    {
        return $this->enceinte;
    }

    public function setEnceinte(?bool $enceinte): self
    {
        $this->enceinte = $enceinte;

        return $this;
    }

    public function getPillule(): ?bool
    {
        return $this->pillule;
    }

    public function setPillule(?bool $pillule): self
    {
        $this->pillule = $pillule;

        return $this;
    }

    
}
