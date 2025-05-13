<?php

namespace App\Entity;

use App\Repository\ResponsableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResponsableRepository::class)]
class Responsable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $relation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $homePhone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $workPhone = null;

    #[ORM\Column]
    private ?bool $sms = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $job = null;

    /**
     * @var Collection<int, Eleve>
     */
    #[ORM\ManyToMany(targetEntity: Eleve::class, inversedBy: 'responsables')]
    private Collection $eleve;

    public function __construct()
    {
        $this->eleve = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(string $relation): static
    {
        $this->relation = $relation;

        return $this;
    }

    public function getHomePhone(): ?string
    {
        return $this->homePhone;
    }

    public function setHomePhone(?string $homePhone): static
    {
        $this->homePhone = $homePhone;

        return $this;
    }

    public function getWorkPhone(): ?string
    {
        return $this->workPhone;
    }

    public function setWorkPhone(?string $workPhone): static
    {
        $this->workPhone = $workPhone;

        return $this;
    }

    public function isSms(): ?bool
    {
        return $this->sms;
    }

    public function setSms(bool $sms): static
    {
        $this->sms = $sms;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(?string $job): static
    {
        $this->job = $job;

        return $this;
    }

    /**
     * @return Collection<int, Eleve>
     */
    public function getEleve(): Collection
    {
        return $this->eleve;
    }

    public function addEleve(Eleve $eleve): static
    {
        if (!$this->eleve->contains($eleve)) {
            $this->eleve->add($eleve);
        }

        return $this;
    }

    public function removeEleve(Eleve $eleve): static
    {
        $this->eleve->removeElement($eleve);

        return $this;
    }
}
