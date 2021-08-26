<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MarqueRepository::class)
 */
class Marque
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Vvente::class, mappedBy="marques")
     */
    private $vventes;

    /**
     * @ORM\ManyToOne(targetEntity=Recherche::class, inversedBy="marques")
     */
    private $recherche;



    public function __construct()
    {
        $this->vventes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Vvente[]
     */
    public function getVventes(): Collection
    {
        return $this->vventes;
    }

    public function addVvente(Vvente $vvente): self
    {
        if (!$this->vventes->contains($vvente)) {
            $this->vventes[] = $vvente;
            $vvente->setMarques($this);
        }

        return $this;
    }

    public function removeVvente(Vvente $vvente): self
    {
        if ($this->vventes->removeElement($vvente)) {
            // set the owning side to null (unless already changed)
            if ($vvente->getMarques() === $this) {
                $vvente->setMarques(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getNom();
    }

    public function getRecherche(): ?Recherche
    {
        return $this->recherche;
    }

    public function setRecherche(?Recherche $recherche): self
    {
        $this->recherche = $recherche;

        return $this;
    }

}
