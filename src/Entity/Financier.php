<?php

namespace App\Entity;

use App\Repository\FinancierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinancierRepository::class)]
class Financier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $rib = null;

    /**
     * @var Collection<int, Eleve>
     */
    #[ORM\OneToMany(targetEntity: Eleve::class, mappedBy: 'financier')]
    private Collection $id_eleve;

    public function __construct()
    {
        $this->id_eleve = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRib(): ?string
    {
        return $this->rib;
    }

    public function setRib(string $rib): static
    {
        $this->rib = $rib;

        return $this;
    }

    /**
     * @return Collection<int, Eleve>
     */
    public function getIdEleve(): Collection
    {
        return $this->id_eleve;
    }

    public function addIdEleve(Eleve $idEleve): static
    {
        if (!$this->id_eleve->contains($idEleve)) {
            $this->id_eleve->add($idEleve);
            $idEleve->setFinancier($this);
        }

        return $this;
    }

    public function removeIdEleve(Eleve $idEleve): static
    {
        if ($this->id_eleve->removeElement($idEleve)) {
            // set the owning side to null (unless already changed)
            if ($idEleve->getFinancier() === $this) {
                $idEleve->setFinancier(null);
            }
        }

        return $this;
    }

}
