<?php

namespace App\Entity;

use App\Repository\ConsultRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * @ORM\Entity(repositoryClass=ConsultRepository::class)
 * @ApiResource()
 * @Gedmo\SoftDeleteable()
 */
class Consult
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
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $symptomePrinc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $symptomePrincHisto;

    /**
     * @ORM\Column(type="text", length=255)
     */
    private $symptomeAssocie;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $antecedent;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $allureRessentiEnergie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $teintVisage;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $zoneColoreVisage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shen;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $langue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pouls;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $morphologie;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $palpationAuscultationOlfaction;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $transitIntestinal;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="consults" )
     * @ORM\JoinColumn(nullable=true)
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="consults")
     */
    private $patient;

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

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(?string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getPouls(): ?string
    {
        return $this->pouls;
    }

    public function setPouls(?string $pouls): self
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
