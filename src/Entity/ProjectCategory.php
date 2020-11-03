<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProjectCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read:all:project"}},
 *     collectionOperations={"GET"},
 *     itemOperations={"GET"},
 *     attributes={"order"={"id": "ASC", "projects.startDate": "ASC"}}
 * )
 * @UniqueEntity("name", message="La catégorie de projet {{ value }} existe déjà.")
 * @ORM\Entity(repositoryClass=ProjectCategoryRepository::class)
 */
class ProjectCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"read:all:project"})
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @Groups({"read:all:project"})
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @Groups({"read:all:project"})
     * @ORM\OneToMany(targetEntity=Project::class, mappedBy="category", orphanRemoval=true)
     */
    private $projects;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setCategory($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        // set the owning side to null (unless already changed)
        if ($this->projects->removeElement($project) && $project->getCategory() === $this) {
            $project->setCategory(null);
        }

        return $this;
    }
}
