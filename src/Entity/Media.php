<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Type = null;

    #[ORM\Column(length: 100)]
    private ?string $Lien = null;

    #[ORM\Column(length: 50)]
    private ?string $Alt = null;

    #[ORM\ManyToOne(inversedBy: 'media')]
    private ?Produit $Num_Produit = null;

    #[ORM\ManyToOne(inversedBy: 'media')]
    private ?Categorie $Num_Categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): static
    {
        $this->Type = $Type;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->Lien;
    }

    public function setLien(string $Lien): static
    {
        $this->Lien = $Lien;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->Alt;
    }

    public function setAlt(string $Alt): static
    {
        $this->Alt = $Alt;

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

    public function getNumCategorie(): ?Categorie
    {
        return $this->Num_Categorie;
    }

    public function setNumCategorie(?Categorie $Num_Categorie): static
    {
        $this->Num_Categorie = $Num_Categorie;

        return $this;
    }
}
