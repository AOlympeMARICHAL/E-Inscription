<?php

namespace App\Entity;

use App\Repository\AContacterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AContacterRepository::class)]
class AContacter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'a_contacter')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Urgence $id_urgence = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUrgence(): ?Urgence
    {
        return $this->id_urgence;
    }

    public function setIdUrgence(?Urgence $id_urgence): static
    {
        $this->id_urgence = $id_urgence;

        return $this;
    }
}
