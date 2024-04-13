<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Identifiant_user = null;

    #[ORM\Column(length: 50)]
    private ?string $Nom = null;

    #[ORM\Column(length: 50)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 100)]
    private ?string $Email = null;

    #[ORM\Column(length: 10)]
    private ?string $Tel = null;

    #[ORM\Column(length: 100)]
    private ?string $Password = null;

    #[ORM\OneToMany(targetEntity: Commande::class, mappedBy: 'Identifiant_user')]
    private Collection $commandes;

    #[ORM\OneToMany(targetEntity: Panier::class, mappedBy: 'Identifiant_user')]
    private Collection $paniers;

    #[ORM\OneToMany(targetEntity: AdresseUser::class, mappedBy: 'Identifiant_user')]
    private Collection $adresseUsers;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->paniers = new ArrayCollection();
        $this->adresseUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifiantUser(): ?string
    {
        return $this->Identifiant_user;
    }

    public function setIdentifiantUser(string $Identifiant_user): static
    {
        $this->Identifiant_user = $Identifiant_user;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->Tel;
    }

    public function setTel(string $Tel): static
    {
        $this->Tel = $Tel;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): static
    {
        $this->Password = $Password;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setIdentifiantUser($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getIdentifiantUser() === $this) {
                $commande->setIdentifiantUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Panier>
     */
    public function getPaniers(): Collection
    {
        return $this->paniers;
    }

    public function addPanier(Panier $panier): static
    {
        if (!$this->paniers->contains($panier)) {
            $this->paniers->add($panier);
            $panier->setIdentifiantUser($this);
        }

        return $this;
    }

    public function removePanier(Panier $panier): static
    {
        if ($this->paniers->removeElement($panier)) {
            // set the owning side to null (unless already changed)
            if ($panier->getIdentifiantUser() === $this) {
                $panier->setIdentifiantUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AdresseUser>
     */
    public function getAdresseUsers(): Collection
    {
        return $this->adresseUsers;
    }

    public function addAdresseUser(AdresseUser $adresseUser): static
    {
        if (!$this->adresseUsers->contains($adresseUser)) {
            $this->adresseUsers->add($adresseUser);
            $adresseUser->setIdentifiantUser($this);
        }

        return $this;
    }

    public function removeAdresseUser(AdresseUser $adresseUser): static
    {
        if ($this->adresseUsers->removeElement($adresseUser)) {
            // set the owning side to null (unless already changed)
            if ($adresseUser->getIdentifiantUser() === $this) {
                $adresseUser->setIdentifiantUser(null);
            }
        }

        return $this;
    }
}
