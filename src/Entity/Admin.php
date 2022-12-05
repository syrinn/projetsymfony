<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
#[ORM\Table(name: '`admin`')]
class Admin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\OneToMany(mappedBy: 'administrateur', targetEntity: Compte::class)]
    private Collection $comptes;

    public function __construct()
    {
        $this->comptes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, Compte>
     */
    public function getComptes(): Collection
    {
        return $this->comptes;
    }

    public function addCompte(Compte $compte): self
    {
        if (!$this->comptes->contains($compte)) {
            $this->comptes->add($compte);
            $compte->setAdministrateur($this);
        }

        return $this;
    }

    public function removeCompte(Compte $compte): self
    {
        if ($this->comptes->removeElement($compte)) {
            // set the owning side to null (unless already changed)
            if ($compte->getAdministrateur() === $this) {
                $compte->setAdministrateur(null);
            }
        }

        return $this;
    }
}
