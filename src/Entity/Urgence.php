<?php

namespace App\Entity;

use App\Repository\UrgenceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UrgenceRepository::class)]
class Urgence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateVaccine = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observation = null;

    #[ORM\Column(length: 255)]
    private ?string $nameDoctor = null;

    #[ORM\Column(length: 255)]
    private ?string $addressDoctor = null;

    #[ORM\Column(length: 255)]
    private ?string $phoneDoctor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateVaccine(): ?\DateTimeInterface
    {
        return $this->dateVaccine;
    }

    public function setDateVaccine(\DateTimeInterface $dateVaccine): static
    {
        $this->dateVaccine = $dateVaccine;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): static
    {
        $this->observation = $observation;

        return $this;
    }

    public function getNameDoctor(): ?string
    {
        return $this->nameDoctor;
    }

    public function setNameDoctor(string $nameDoctor): static
    {
        $this->nameDoctor = $nameDoctor;

        return $this;
    }

    public function getAddressDoctor(): ?string
    {
        return $this->addressDoctor;
    }

    public function setAddressDoctor(string $addressDoctor): static
    {
        $this->addressDoctor = $addressDoctor;

        return $this;
    }

    public function getPhoneDoctor(): ?string
    {
        return $this->phoneDoctor;
    }

    public function setPhoneDoctor(string $phoneDoctor): static
    {
        $this->phoneDoctor = $phoneDoctor;

        return $this;
    }
}
