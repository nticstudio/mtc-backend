<?php

namespace App\Entity;

use App\Repository\ConsultRepository;
use ApiPlatform\Core\Annotation\ApiResource;
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
 *           }
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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:consult"})
     */
    private $teintVisage;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:consult"})
     */
    private $zoneColoreVisage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
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
     * @ORM\Column(type="string", length=255, nullable=true)
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

    public function getTeintVisage(): ?string
    {
        return $this->teintVisage;
    }

    public function setTeintVisage(?string $teintVisage): self
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

    public function getShen(): ?string
    {
        return $this->shen;
    }

    public function setShen(?string $shen): self
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

    public function getMorphologie(): ?string
    {
        return $this->morphologie;
    }

    public function setMorphologie(?string $morphologie): self
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

 
}
