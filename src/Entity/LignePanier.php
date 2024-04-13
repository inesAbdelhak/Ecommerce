<?php

namespace App\Entity;

use App\Repository\LignePanierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LignePanierRepository::class)]
class LignePanier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Quantite = null;

    #[ORM\ManyToOne(inversedBy: 'lignePaniers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $Num_Produit = null;

    #[ORM\ManyToOne(inversedBy: 'lignePaniers')]
    private ?Panier $Num_Panier = null;

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

    public function getNumProduit(): ?Produit
    {
        return $this->Num_Produit;
    }

    public function setNumProduit(?Produit $Num_Produit): static
    {
        $this->Num_Produit = $Num_Produit;

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
}
