<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EleveRepository::class)]
class Eleve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 11, nullable: true)]
    private ?string $INE = null;

    #[ORM\Column(length: 13, nullable: true)]
    private ?string $secu = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateEntree = null;

    #[ORM\Column(length: 1, nullable: true)]
    private ?string $sexe = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nationality = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateBirth = null;

    #[ORM\Column(length: 3, nullable: true)]
    private ?string $departmentBirth = null;

    #[ORM\Column(nullable: true)]
    private ?bool $gradeRepetition = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $regime = null;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $transport = [];

    #[ORM\Column(length: 8, nullable: true)]
    private ?string $immaVehicle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $speciality = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lv1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lv2 = null;

    #[ORM\Column(nullable: true)]
    private ?bool $mdl = null;

    #[ORM\Column(nullable: true)]
    private ?bool $copyright = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bachelor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vitalCard = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $idCertificate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $assurance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cours = null;

    #[ORM\ManyToOne(inversedBy: 'id_eleve')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Financier $financier = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?Individu $individu = null;

    /**
     * @var Collection<int, Antecedent>
     */
    #[ORM\OneToMany(targetEntity: Antecedent::class, mappedBy: 'id_eleve')]
    private Collection $antecedent;

    #[ORM\Column(nullable: true)]
    private ?bool $redoublement = null;

    /**
     * @var Collection<int, Responsable>
     */
    #[ORM\ManyToMany(targetEntity: Responsable::class, mappedBy: 'eleve')]
    private Collection $responsables;

    public function __construct()
    {
        $this->antecedent = new ArrayCollection();
        $this->responsables = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getINE(): ?string
    {
        return $this->INE;
    }

    public function setINE(string $INE): static
    {
        $this->INE = $INE;

        return $this;
    }

    public function getSecu(): ?string
    {
        return $this->secu;
    }

    public function setSecu(string $secu): static
    {
        $this->secu = $secu;

        return $this;
    }

    public function getDateEntree(): ?\DateTimeInterface
    {
        return $this->dateEntree;
    }

    public function setDateEntree(?\DateTimeInterface $dateEntree): static
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): static
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getDateBirth(): ?\DateTimeInterface
    {
        return $this->dateBirth;
    }

    public function setDateBirth(\DateTimeInterface $dateBirth): static
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    public function getDepartmentBirth(): ?string
    {
        return $this->departmentBirth;
    }

    public function setDepartmentBirth(string $departmentBirth): static
    {
        $this->departmentBirth = $departmentBirth;

        return $this;
    }

    public function isGradeRepetition(): ?bool
    {
        return $this->gradeRepetition;
    }

    public function setGradeRepetition(bool $gradeRepetition): static
    {
        $this->gradeRepetition = $gradeRepetition;

        return $this;
    }

    public function getRegime(): ?string
    {
        return $this->regime;
    }

    public function setRegime(string $regime): static
    {
        $this->regime = $regime;

        return $this;
    }

    public function getTransport(): ?array
{
    return $this->transport;
}

public function setTransport(?array $transport): self
{
    $this->transport = $transport;
    return $this;
}

    public function getImmaVehicle(): ?string
    {
        return $this->immaVehicle;
    }

    public function setImmaVehicle(?string $immaVehicle): static
    {
        $this->immaVehicle = $immaVehicle;

        return $this;
    }

    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    public function setSpeciality(string $speciality): static
    {
        $this->speciality = $speciality;

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

    public function isMdl(): ?bool
    {
        return $this->mdl;
    }

    public function setMdl(bool $mdl): static
    {
        $this->mdl = $mdl;

        return $this;
    }

    public function isCopyright(): ?bool
    {
        return $this->copyright;
    }

    public function setCopyright(bool $copyright): static
    {
        $this->copyright = $copyright;

        return $this;
    }

    public function getBachelor(): ?string
    {
        return $this->bachelor;
    }

    public function setBachelor(string $bachelor): static
    {
        $this->bachelor = $bachelor;

        return $this;
    }

    public function getVitalCard(): ?string
    {
        return $this->vitalCard;
    }

    public function setVitalCard(string $vitalCard): static
    {
        $this->vitalCard = $vitalCard;

        return $this;
    }

    public function getIdCertificate(): ?string
    {
        return $this->idCertificate;
    }

    public function setIdCertificate(string $idCertificate): static
    {
        $this->idCertificate = $idCertificate;

        return $this;
    }

    public function getAssurance(): ?string
    {
        return $this->assurance;
    }

    public function setAssurance(?string $assurance): static
    {
        $this->assurance = $assurance;

        return $this;
    }

    public function getCours(): ?string
    {
        return $this->cours;
    }

    public function setCours(?string $cours): static
    {
        $this->cours = $cours;

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

    public function getIndividu(): ?Individu
    {
        return $this->individu;
    }

    public function setIndividu(Individu $individu): static
    {
        $this->individu = $individu;

        return $this;
    }

    /**
     * @return Collection<int, Antecedent>
     */
    public function getAntecedent(): Collection
    {
        return $this->antecedent;
    }

    public function addAntecedent(Antecedent $antecedent): static
    {
        if (!$this->antecedent->contains($antecedent)) {
            $this->antecedent->add($antecedent);
            $antecedent->setIdEleve($this);
        }

        return $this;
    }

    public function removeAntecedent(Antecedent $antecedent): static
    {
        if ($this->antecedent->removeElement($antecedent)) {
            // set the owning side to null (unless already changed)
            if ($antecedent->getIdEleve() === $this) {
                $antecedent->setIdEleve(null);
            }
        }

        return $this;
    }

    public function isRedoublement(): ?bool
    {
        return $this->redoublement;
    }

    public function setRedoublement(?bool $redoublement): static
    {
        $this->redoublement = $redoublement;

        return $this;
    }

    /**
     * @return Collection<int, Responsable>
     */
    public function getResponsables(): Collection
    {
        return $this->responsables;
    }

    public function addResponsable(Responsable $responsable): static
    {
        if (!$this->responsables->contains($responsable)) {
            $this->responsables->add($responsable);
            $responsable->addEleve($this);
        }

        return $this;
    }

    public function removeResponsable(Responsable $responsable): static
    {
        if ($this->responsables->removeElement($responsable)) {
            $responsable->removeEleve($this);
        }

        return $this;
    }

}
