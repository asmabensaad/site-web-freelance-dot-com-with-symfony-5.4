<?php

namespace App\Entity;

use App\Repository\CategorieProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieProjetRepository::class)]
class CategorieProjet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\OneToMany(mappedBy: 'CategorieProjet', targetEntity: Projet::class)]
    private $projects;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
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

    /**
     * @return Collection<int, Projet>
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Projet $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setCategorieProjet($this);
        }

        return $this;
    }

    public function removeProject(Projet $project): self
    {
        if ($this->projects->removeElement($project)) {
            // set the owning side to null (unless already changed)
            if ($project->getCategorieProjet() === $this) {
                $project->setCategorieProjet(null);
            }
        }

        return $this;
    }



    public function __toString() {
        return $this->nom;
    }
}

