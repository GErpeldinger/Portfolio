<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LinkRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read:all:link"}},
 *     collectionOperations={"GET"},
 *     itemOperations={"GET"}
 * )
 * @ORM\Entity(repositoryClass=LinkRepository::class)
 */
class Link
{
    public const CONTACT = [
        'name' => 'contact',
        'url'  => 'mailto:erpeldinger.g@gmail.com'
    ];

    public const LINKEDIN = [
        'name' => 'linkedin',
        'url'  => 'https://www.linkedin.com/in/guillaumeerpeldinger/'
    ];

    public const GITHUB = [
        'name' => 'github',
        'url'  => 'https://github.com/Nighter33'
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $name;

    /**
     * @SerializedName("href")
     * @Groups({"read:all:link"})
     * @ORM\Column(type="string", length=2083)
     */
    private $url;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
