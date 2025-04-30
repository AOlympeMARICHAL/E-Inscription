<?php

namespace App\Entity;

use App\Repository\AntecedentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AntecedentRepository::class)]
class Antecedent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $annee = null;

    #[ORM\Column(length: 255)]
    private ?string $classe = null;

    #[ORM\Column(length: 255)]
    private ?string $lv1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lv2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $option = null;

    #[ORM\Column(length: 255)]
    private ?string $school = null;

    #[ORM\ManyToOne(inversedBy: 'antecedent')]
    private ?Eleve $id_eleve = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->annee;
    }

    public function setAnnee(\DateTimeInterface $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): static
    {
        $this->classe = $classe;

        return $this;
    }

    public function getLv1(): ?string
    {
        return $this->lv1;
    }

    public function setLv1(string $lv1): static
    {
        $this->lv1 = $lv1;

        return $this;
    }

    public function getLv2(): ?string
    {
        return $this->lv2;
    }

    public function setLv2(?string $lv2): static
    {
        $this->lv2 = $lv2;

        return $this;
    }

    public function getOption(): ?string
    {
        return $this->option;
    }

    public function setOption(?string $option): static
    {
        $this->option = $option;

        return $this;
    }

    public function getSchool(): ?string
    {
        return $this->school;
    }

    public function setSchool(string $school): static
    {
        $this->school = $school;

        return $this;
    }

    public function getIdEleve(): ?Eleve
    {
        return $this->id_eleve;
    }

    public function setIdEleve(?Eleve $id_eleve): static
    {
        $this->id_eleve = $id_eleve;

        return $this;
    }

}
