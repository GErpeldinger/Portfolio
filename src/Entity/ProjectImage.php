<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProjectImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ApiResource(
 *     collectionOperations={},
 *     itemOperations={"GET"}
 * )
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass=ProjectImageRepository::class)
 */
class ProjectImage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"read:project"})
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="project_image", fileNameProperty="image")
     * @var File $imageFile
     */
    private $imageFile;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     */
    private $isCover;

    /**
     * @ORM\ManyToOne(targetEntity=Project::class, inversedBy="projectImages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @Groups({"read:project"})
     */
    public function getPath(): string
    {
        return '/uploads/images/project/' . $this->getImage();
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(File $imageFile = null): self
    {
        $this->imageFile = $imageFile;

        return $this;
    }

    public function getIsCover(): ?bool
    {
        return $this->isCover;
    }

    public function setIsCover(bool $isCover): self
    {
        $this->isCover = $isCover;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }
}
