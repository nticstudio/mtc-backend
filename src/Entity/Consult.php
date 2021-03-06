<?php

namespace App\Entity;

use App\Repository\ConsultRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
/**
 * @ORM\Entity(repositoryClass=ConsultRepository::class)
 * @ApiResource(
 *      normalizationContext={"groups"={"read:consults"}},
*      itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"read:consults","read:consult"}}
 *           },
 *          "put"={},
 *          "delete"={},
 *      }
 * )
 * @Apifilter(
 *      SearchFilter::class, properties= { "patient.id": "exact", "createdBy.id" : "exact"}
 * )
 * @Gedmo\SoftDeleteable()
 */
class Consult
{

   
   // use TimestampableEntity;
    use SoftDeleteableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:consults","read:patient","read:user"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:consults","read:patient","read:user"})
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     * @Groups({"read:consult"})
     */
    private $symptomePrinc;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:consult"})
     */
    private $symptomePrincHisto;

    /**
     * @ORM\Column(type="text", length=255)
     * @Groups({"read:consult"})
     */
    private $symptomeAssocie;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:consult"})
     */
    private $antecedent;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:consult"})
     */
    private $allureRessentiEnergie;

    /**
     * @ORM\Column(type="smallint",  nullable=true)
     * @Groups({"read:consult"})
     */
    private $teintVisage;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:consult"})
     */
    private $zoneColoreVisage;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"read:consult"})
     */
    private $shen;

    /**
     * @ORM\Column(type="array", nullable=true)
     * @Groups({"read:consult"})
     */
    private $langue = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     * @Groups({"read:consult"})
     */
    private $pouls = [];

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"read:consult"})
     */
    private $morphologie;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:consult"})
     */
    private $palpationAuscultationOlfaction;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:consult"})
     */
    private $transitIntestinal;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="consults" )
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"read:consult"})
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="consults")
     * @Groups({"read:consults","read:user"})
     */
    private $patient;

     /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     * @Groups({"read:consults","read:patient","read:user"})
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     * @Groups({"read:consult"})
     */
    protected $updatedAt;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"read:consult"})
     */
    private $diagone;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"read:consult"})
     */
    private $diagtwo;

    /**
     * @ORM\Column(type="smallint",  nullable=true)
     * @Groups({"read:consult"})
     */
    private $diagthree;

    /**
     * @ORM\Column(type="smallint",  nullable=true)
     * @Groups({"read:consult"})
     */
    private $diagfour;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:consult"})
     */
    private $diagcom;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:consult"})
     */
    private $syndrome;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:consult"})
     */
    private $principeTraitement;

    /**
     * @ORM\OneToMany(targetEntity=Note::class, mappedBy="consult", orphanRemoval=true)
     * @Groups({"read:consult"})
     */
    private $notes;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
    }

    /** !TODO Une consultation possede un diagnostique  */   

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSymptomePrinc(): ?string
    {
        return $this->symptomePrinc;
    }

    public function setSymptomePrinc(string $symptomePrinc): self
    {
        $this->symptomePrinc = $symptomePrinc;

        return $this;
    }

    public function getSymptomePrincHisto(): ?string
    {
        return $this->symptomePrincHisto;
    }

    public function setSymptomePrincHisto(?string $symptomePrincHisto): self
    {
        $this->symptomePrincHisto = $symptomePrincHisto;

        return $this;
    }

    public function getSymptomeAssocie(): ?string
    {
        return $this->symptomeAssocie;
    }

    public function setSymptomeAssocie(string $symptomeAssocie): self
    {
        $this->symptomeAssocie = $symptomeAssocie;

        return $this;
    }

    public function getAntecedent(): ?string
    {
        return $this->antecedent;
    }

    public function setAntecedent(?string $antecedent): self
    {
        $this->antecedent = $antecedent;

        return $this;
    }

    public function getAllureRessentiEnergie(): ?string
    {
        return $this->allureRessentiEnergie;
    }

    public function setAllureRessentiEnergie(?string $allureRessentiEnergie): self
    {
        $this->allureRessentiEnergie = $allureRessentiEnergie;

        return $this;
    }

    public function getTeintVisage(): ?int
    {
        return $this->teintVisage;
    }

    public function setTeintVisage(?int $teintVisage): self
    {
        $this->teintVisage = $teintVisage;

        return $this;
    }

    public function getZoneColoreVisage(): ?string
    {
        return $this->zoneColoreVisage;
    }

    public function setZoneColoreVisage(?string $zoneColoreVisage): self
    {
        $this->zoneColoreVisage = $zoneColoreVisage;

        return $this;
    }

    public function getShen(): ?int
    {
        return $this->shen;
    }

    public function setShen(?int $shen): self
    {
        $this->shen = $shen;

        return $this;
    }

    public function getLangue(): ?array
    {
        return $this->langue;
    }

    public function setLangue(?array $langue): self
    {
        $this->langue = $langue;

        return $this;
    }


    public function getPouls(): ?array
    {
        return $this->pouls;
    }

    public function setPouls(?array $pouls): self
    {
        $this->pouls = $pouls;

        return $this;
    }

    public function getMorphologie(): ?int
    {
        return $this->morphologie;
    }

    public function setMorphologie(?int $morphologie): self
    {
        $this->morphologie = $morphologie;

        return $this;
    }

    public function getPalpationAuscultationOlfaction(): ?string
    {
        return $this->palpationAuscultationOlfaction;
    }

    public function setPalpationAuscultationOlfaction(?string $palpationAuscultationOlfaction): self
    {
        $this->palpationAuscultationOlfaction = $palpationAuscultationOlfaction;

        return $this;
    }

    public function getTransitIntestinal(): ?string
    {
        return $this->transitIntestinal;
    }

    public function setTransitIntestinal(?string $transitIntestinal): self
    {
        $this->transitIntestinal = $transitIntestinal;

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

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getDiagone(): ?int
    {
        return $this->diagone;
    }

    public function setDiagone(?int $diagone): self
    {
        $this->diagone = $diagone;

        return $this;
    }

    public function getDiagtwo(): ?int
    {
        return $this->diagtwo;
    }

    public function setDiagtwo(?int $diagtwo): self
    {
        $this->diagtwo = $diagtwo;

        return $this;
    }

    public function getDiagthree(): ?int
    {
        return $this->diagthree;
    }

    public function setDiagthree(?int $diagthree): self
    {
        $this->diagthree = $diagthree;

        return $this;
    }

    public function getDiagfour(): ?int
    {
        return $this->diagfour;
    }

    public function setDiagfour(?int $diagfour): self
    {
        $this->diagfour = $diagfour;

        return $this;
    }

    public function getDiagcom(): ?string
    {
        return $this->diagcom;
    }

    public function setDiagcom(?string $diagcom): self
    {
        $this->diagcom = $diagcom;

        return $this;
    }

    public function getSyndrome(): ?string
    {
        return $this->syndrome;
    }

    public function setSyndrome(?string $syndrome): self
    {
        $this->syndrome = $syndrome;

        return $this;
    }

    public function getPrincipeTraitement(): ?string
    {
        return $this->principeTraitement;
    }

    public function setPrincipeTraitement(?string $principeTraitement): self
    {
        $this->principeTraitement = $principeTraitement;

        return $this;
    }

    /**
     * @return Collection|Note[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setConsult($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getConsult() === $this) {
                $note->setConsult(null);
            }
        }

        return $this;
    }

 
}
