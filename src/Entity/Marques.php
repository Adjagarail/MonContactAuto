<?php

namespace App\Entity;

use App\Repository\MarquesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MarquesRepository::class)
 */
class Marques
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
     * @ORM\OneToMany(targetEntity=Voiture::class, mappedBy="marques")
     */
    private $voitures;

    public function __construct()
    {
        $this->voitures = new ArrayCollection();
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
        public function getVoitures(): Collection
        {
            return $this->voitures;
        }

        public function addVoiture(Voiture $voiture): self
        {
            if (!$this->voitures->contains($voiture)) {
                $this->voitures[] = $voiture;
                $voiture->setMarques($this);
            }

            return $this;
        }

        public function removeVoiture(Voiture $voiture): self
        {
            if ($this->voitures->removeElement($voiture)) {
                // set the owning side to null (unless already changed)
                if ($voiture->getMarques() === $this) {
                    $voiture->setMarques(null);
                }
            }

            return $this;
        }
        public function __toString()
        {
            // TODO: Implement __toString() method.
            return $this->name;
        }
}
