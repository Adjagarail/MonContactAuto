<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VilleRepository::class)
 */
class Ville
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
     * @ORM\OneToMany(targetEntity=Voiture::class, mappedBy="ville")
     */
    private $voiture;

    public function __construct()
    {
        $this->voiture = new ArrayCollection();
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

    /**
     * @return Collection|Voiture[]
     */
    public function getVoiture(): Collection
    {
        return $this->voiture;
    }

    public function addVoiture(Voiture $voiture): self
    {
        if (!$this->voiture->contains($voiture)) {
            $this->voiture[] = $voiture;
            $voiture->setVille($this);
        }

        return $this;
    }

    public function removeVoiture(Voiture $voiture): self
    {
        if ($this->voiture->removeElement($voiture)) {
            // set the owning side to null (unless already changed)
            if ($voiture->getVille() === $this) {
                $voiture->setVille(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
