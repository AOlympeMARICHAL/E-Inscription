<?php

namespace App\Entity;

use App\Repository\IndividuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IndividuRepository::class)]
class Individu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $mobilePhone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(length: 6, nullable: true)]
    private ?string $zip = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commune = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nameBoss = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $addressBoss = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Financier $financier = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Responsable $responsable = null;

    #[ORM\ManyToOne(inversedBy: 'id_individu')]
    private ?Urgence $urgence = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMobilePhone(): ?string
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(string $mobilePhone): static
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(string $zip): static
    {
        $this->zip = $zip;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): static
    {
        $this->commune = $commune;

        return $this;
    }

    public function getNameBoss(): ?string
    {
        return $this->nameBoss;
    }

    public function setNameBoss(?string $nameBoss): static
    {
        $this->nameBoss = $nameBoss;

        return $this;
    }

    public function getAddressBoss(): ?string
    {
        return $this->addressBoss;
    }

    public function setAddressBoss(?string $addressBoss): static
    {
        $this->addressBoss = $addressBoss;

        return $this;
    }

    public function getFinancier(): ?Financier
    {
        return $this->financier;
    }

    public function setFinancier(?Financier $financier): static
    {
        $this->financier = $financier;

        return $this;
    }

    public function getResponsable(): ?Responsable
    {
        return $this->responsable;
    }

    public function setResponsable(?Responsable $responsable): static
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getUrgence(): ?Urgence
    {
        return $this->urgence;
    }

    public function setUrgence(?Urgence $urgence): static
    {
        $this->urgence = $urgence;

        return $this;
    }
}
