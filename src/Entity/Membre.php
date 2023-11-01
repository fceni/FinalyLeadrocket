<?php

namespace App\Entity;

use App\Repository\MembreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MembreRepository::class)]
class Membre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $entreprise = null;

    #[ORM\OneToMany(mappedBy: 'membre', targetEntity: Vote::class)]
    private Collection $vote;

    public function __construct()
    {
        $this->vote = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(string $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * @return Collection<int, Vote>
     */
    public function getVote(): Collection
    {
        return $this->vote;
    }

    public function addVote(Vote $vote): self
    {
        if (!$this->vote->contains($vote)) {
            $this->vote->add($vote);
            $vote->setMembre($this);
        }

        return $this;
    }

    public function removeVote(Vote $vote): self
    {
        if ($this->vote->removeElement($vote)) {
            // set the owning side to null (unless already changed)
            if ($vote->getMembre() === $this) {
                $vote->setMembre(null);
            }
        }

        return $this;
    }
}
