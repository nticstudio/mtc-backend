<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ZonevalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ZonevalRepository::class)
 */
class Zoneval
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $orderval;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $val;

    /**
     * @ORM\ManyToOne(targetEntity=Zone::class, inversedBy="zonevals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $zone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderval(): ?int
    {
        return $this->orderval;
    }

    public function setOrderval(?int $orderval): self
    {
        $this->orderval = $orderval;

        return $this;
    }

    public function getVal(): ?string
    {
        return $this->val;
    }

    public function setVal(string $val): self
    {
        $this->val = $val;

        return $this;
    }

    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }
}
