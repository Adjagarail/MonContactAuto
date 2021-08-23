<?php

namespace App\Entity;

use App\Repository\DestinerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DestinerRepository::class)
 */
class Destiner
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=Voiture::class, inversedBy="destiner", cascade={"persist", "remove"})
     */
    private $voiture;

    /**
     * @ORM\Column(type="boolean")
     */
    private $names;

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

    public function getVoiture(): ?Voiture
    {
        return $this->voiture;
    }

    public function setVoiture(?Voiture $voiture): self
    {
        $this->voiture = $voiture;

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }

    public function getNames(): ?bool
    {
        return $this->names;
    }

    public function setNames(bool $names): self
    {
        $this->names = $names;

        return $this;
    }
}
