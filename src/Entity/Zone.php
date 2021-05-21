<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ZoneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ZoneRepository::class)
 */
class Zone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $defaut;

    /**
     * @ORM\OneToMany(targetEntity=Zoneval::class, mappedBy="zone")
     */
    private $zonevals;

    public function __construct()
    {
        $this->zonevals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
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

    public function getDefaut(): ?string
    {
        return $this->defaut;
    }

    public function setDefaut(?string $defaut): self
    {
        $this->defaut = $defaut;

        return $this;
    }

    /**
     * @return Collection|Zoneval[]
     */
    public function getZonevals(): Collection
    {
        return $this->zonevals;
    }

    public function addZoneval(Zoneval $zoneval): self
    {
        if (!$this->zonevals->contains($zoneval)) {
            $this->zonevals[] = $zoneval;
            $zoneval->setZone($this);
        }

        return $this;
    }

    public function removeZoneval(Zoneval $zoneval): self
    {
        if ($this->zonevals->removeElement($zoneval)) {
            // set the owning side to null (unless already changed)
            if ($zoneval->getZone() === $this) {
                $zoneval->setZone(null);
            }
        }

        return $this;
    }
}
