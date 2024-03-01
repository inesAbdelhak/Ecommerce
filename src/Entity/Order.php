<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $NumCommande = null;

    #[ORM\Column]
    private ?bool $validite = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumCommande(): ?int
    {
        return $this->NumCommande;
    }

    public function setNumCommande(int $NumCommande): static
    {
        $this->NumCommande = $NumCommande;

        return $this;
    }

    public function isValidite(): ?bool
    {
        return $this->validite;
    }

    public function setValidite(bool $validite): static
    {
        $this->validite = $validite;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }
}
