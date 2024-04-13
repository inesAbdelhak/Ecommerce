<?php

namespace App\Entity;

use App\Repository\LigneCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneCommandeRepository::class)]
class LigneCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Quantite = null;

    #[ORM\ManyToOne(inversedBy: 'ligneCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $Num_Commande = null;

    #[ORM\ManyToOne(inversedBy: 'ligneCommandes')]
    private ?Produit $Num_Produit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?string
    {
        return $this->Quantite;
    }

    public function setQuantite(string $Quantite): static
    {
        $this->Quantite = $Quantite;

        return $this;
    }

    public function getNumCommande(): ?Commande
    {
        return $this->Num_Commande;
    }

    public function setNumCommande(?Commande $Num_Commande): static
    {
        $this->Num_Commande = $Num_Commande;

        return $this;
    }

    public function getNumProduit(): ?Produit
    {
        return $this->Num_Produit;
    }

    public function setNumProduit(?Produit $Num_Produit): static
    {
        $this->Num_Produit = $Num_Produit;

        return $this;
    }
}
