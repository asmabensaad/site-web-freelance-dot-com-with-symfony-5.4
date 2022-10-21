<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'integer')]
    private $budget;

    #[ORM\Column(type: 'date')]
    private $date_depot;

    #[ORM\Column(type: 'integer')]
    private $duree;

    #[ORM\Column(type: 'string', length: 255)]
    private $Titre;

    #[ORM\ManyToOne(targetEntity: CategorieProjet::class, inversedBy: 'projects')]
    private $CategorieProjet;

    #[ORM\ManyToOne(targetEntity: Entreprise::class, inversedBy: 'Lstprojet')]
    private $deposerPar;

    #[ORM\ManyToMany(targetEntity: Freelancer::class, inversedBy: 'projetpostule')]
    private $candidat;

    #[ORM\Column(type: 'boolean')]
    private $disponible;

    public function __construct()
    {
        $this->candidat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getBudget(): ?int
    {
        return $this->budget;
    }

    public function setBudget(int $budget): self
    {
        $this->budget = $budget;

        return $this;
    }

    public function getDateDepot(): ?\DateTimeInterface
    {
        return $this->date_depot;
    }

    public function setDateDepot(\DateTimeInterface $date_depot): self
    {
        $this->date_depot = $date_depot;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getCategorieProjet(): ?CategorieProjet
    {
        return $this->CategorieProjet;
    }

    public function setCategorieProjet(?CategorieProjet $CategorieProjet): self
    {
        $this->CategorieProjet = $CategorieProjet;

        return $this;
    }

    public function getDeposerPar(): ?Entreprise
    {
        return $this->deposerPar;
    }

    public function setDeposerPar(?Entreprise $deposerPar): self
    {
        $this->deposerPar = $deposerPar;

        return $this;
    }

    /**
     * @return Collection<int, Freelancer>
     */
    public function getCandidat(): Collection
    {
        return $this->candidat;
    }

    public function addCandidat(Freelancer $candidat): self
    {
        if (!$this->candidat->contains($candidat)) {
            $this->candidat[] = $candidat;
        }

        return $this;
    }

    public function removeCandidat(Freelancer $candidat): self
    {
        $this->candidat->removeElement($candidat);

        return $this;
    }

    public function getDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }
}
