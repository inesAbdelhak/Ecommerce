<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Num_Commande = null;

    #[ORM\Column]
    private ?bool $Valide = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $Identifiant_user = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Panier $Num_Panier = null;

    #[ORM\OneToMany(targetEntity: LigneCommande::class, mappedBy: 'Num_Commande')]
    private Collection $ligneCommandes;

    public function __construct()
    {
        $this->ligneCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumCommande(): ?string
    {
        return $this->Num_Commande;
    }

    public function setNumCommande(string $Num_Commande): static
    {
        $this->Num_Commande = $Num_Commande;

        return $this;
    }

    public function isValide(): ?bool
    {
        return $this->Valide;
    }

    public function setValide(bool $Valide): static
    {
        $this->Valide = $Valide;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): static
    {
        $this->Date = $Date;

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

    public function getNumPanier(): ?Panier
    {
        return $this->Num_Panier;
    }

    public function setNumPanier(?Panier $Num_Panier): static
    {
        $this->Num_Panier = $Num_Panier;

        return $this;
    }

    /**
     * @return Collection<int, LigneCommande>
     */
    public function getLigneCommandes(): Collection
    {
        return $this->ligneCommandes;
    }

    public function addLigneCommande(LigneCommande $ligneCommande): static
    {
        if (!$this->ligneCommandes->contains($ligneCommande)) {
            $this->ligneCommandes->add($ligneCommande);
            $ligneCommande->setNumCommande($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): static
    {
        if ($this->ligneCommandes->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getNumCommande() === $this) {
                $ligneCommande->setNumCommande(null);
            }
        }

        return $this;
    }
}
