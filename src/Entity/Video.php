<?php

namespace App\Entity;

use App\Repository\VideoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VideoRepository::class)]
class Video
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\ManyToOne(inversedBy: 'videos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sondage $sondage = null;

//    #[ORM\ManyToOne]
//    #[ORM\JoinColumn(nullable: false)]
//    private ?Sondage $sondages = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSondage(): ?Sondage
    {
        return $this->sondage;
    }

    public function setSondage(?Sondage $sondage): self
    {
        $this->sondage = $sondage;

        return $this;
    }

//    public function getSondages(): ?Sondage
//    {
//        return $this->sondages;
//    }
//
//    public function setSondages(?Sondage $sondages): self
//    {
//        $this->sondages = $sondages;
//
//        return $this;
//    }
}
