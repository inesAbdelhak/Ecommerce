<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Num_Panier = null;

    #[ORM\ManyToOne(inversedBy: 'paniers')]
    private ?User $Identifiant_user = null;

    #[ORM\OneToMany(targetEntity: LignePanier::class, mappedBy: 'Num_Panier')]
    private Collection $lignePaniers;

    public function __construct()
    {
        $this->lignePaniers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumPanier(): ?string
    {
        return $this->Num_Panier;
    }

    public function setNumPanier(string $Num_Panier): static
    {
        $this->Num_Panier = $Num_Panier;

        return $this;
    }

    public function getIdentifiantUser(): ?User
    {
        return $this->Identifiant_user;
    }

    public function setIdentifiantUser(?User $Identifiant_user): static
    {
        $this->Identifiant_user = $Identifiant_user;

        return $this;
    }

    /**
     * @return Collection<int, LignePanier>
     */
    public function getLignePaniers(): Collection
    {
        return $this->lignePaniers;
    }

    public function addLignePanier(LignePanier $lignePanier): static
    {
        if (!$this->lignePaniers->contains($lignePanier)) {
            $this->lignePaniers->add($lignePanier);
            $lignePanier->setNumPanier($this);
        }

        return $this;
    }

    public function removeLignePanier(LignePanier $lignePanier): static
    {
        if ($this->lignePaniers->removeElement($lignePanier)) {
            // set the owning side to null (unless already changed)
            if ($lignePanier->getNumPanier() === $this) {
                $lignePanier->setNumPanier(null);
            }
        }

        return $this;
    }
}
