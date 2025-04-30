<?php

namespace App\Entity;

use App\Repository\UrgenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Individu>
     */
    #[ORM\OneToMany(targetEntity: Individu::class, mappedBy: 'urgence')]
    private Collection $id_individu;

    /**
     * @var Collection<int, AContacter>
     */
    #[ORM\OneToMany(targetEntity: AContacter::class, mappedBy: 'id_urgence')]
    private Collection $a_contacter;

    public function __construct()
    {
        $this->id_individu = new ArrayCollection();
        $this->a_contacter = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Individu>
     */
    public function getIdIndividu(): Collection
    {
        return $this->id_individu;
    }

    public function addIdIndividu(Individu $idIndividu): static
    {
        if (!$this->id_individu->contains($idIndividu)) {
            $this->id_individu->add($idIndividu);
            $idIndividu->setUrgence($this);
        }

        return $this;
    }

    public function removeIdIndividu(Individu $idIndividu): static
    {
        if ($this->id_individu->removeElement($idIndividu)) {
            // set the owning side to null (unless already changed)
            if ($idIndividu->getUrgence() === $this) {
                $idIndividu->setUrgence(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AContacter>
     */
    public function getAContacter(): Collection
    {
        return $this->a_contacter;
    }

    public function addAContacter(AContacter $aContacter): static
    {
        if (!$this->a_contacter->contains($aContacter)) {
            $this->a_contacter->add($aContacter);
            $aContacter->setIdUrgence($this);
        }

        return $this;
    }

    public function removeAContacter(AContacter $aContacter): static
    {
        if ($this->a_contacter->removeElement($aContacter)) {
            // set the owning side to null (unless already changed)
            if ($aContacter->getIdUrgence() === $this) {
                $aContacter->setIdUrgence(null);
            }
        }

        return $this;
    }
}
