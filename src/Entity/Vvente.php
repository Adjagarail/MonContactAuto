<?php

namespace App\Entity;

use App\Repository\VventeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VventeRepository::class)
 */
class Vvente
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero;

    /**
     * @ORM\Column(type="boolean")
     */
    private $called;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="text")
     */
    private $demande;

    /**
     * @ORM\ManyToOne(targetEntity=Marque::class, inversedBy="vventes")
     */
    private $marques;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getCalled(): ?bool
    {
        return $this->called;
    }

    public function setCalled(bool $called): self
    {
        $this->called = $called;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getDemande(): ?string
    {
        return $this->demande;
    }

    public function setDemande(string $demande): self
    {
        $this->demande = $demande;

        return $this;
    }

    public function getMarques(): ?Marque
    {
        return $this->marques;
    }

    public function setMarques(?Marque $marques): self
    {
        $this->marques = $marques;

        return $this;
    }
    public function __toString()
    {
        return $this->marques;
    }
}
