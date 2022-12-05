<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteRepository::class)]
class Compte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'comptes')]
    private ?admin $administrateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdministrateur(): ?admin
    {
        return $this->administrateur;
    }

    public function setAdministrateur(?admin $administrateur): self
    {
        $this->administrateur = $administrateur;

        return $this;
    }
}
