<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $disponibiliter;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $cdispo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rappel;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $rappelAt;

    /**
     * @ORM\OneToMany(targetEntity=Voiture::class, mappedBy="client")
     */
    private $voitures;

    /**
     * @ORM\Column(type="array")
     */
    private $idvoiture = [];

    public function __construct()
    {
        $this->voitures = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

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
    
    public function __toString()
    {
        return $this->prenom;
    }

    public function getDisponibiliter(): ?string
    {
        return $this->disponibiliter;
    }

    public function setDisponibiliter(string $disponibiliter): self
    {
        $this->disponibiliter = $disponibiliter;

        return $this;
    }

    public function getCdispo(): ?string
    {
        return $this->cdispo;
    }

    public function setCdispo(?string $cdispo): self
    {
        $this->cdispo = $cdispo;

        return $this;
    }

    public function getRappel(): ?string
    {
        return $this->rappel;
    }

    public function setRappel(string $rappel): self
    {
        $this->rappel = $rappel;

        return $this;
    }

    public function getRappelAt(): ?\DateTimeInterface
    {
        return $this->rappelAt;
    }

    public function setRappelAt(?\DateTimeInterface $rappelAt): self
    {
        $this->rappelAt = $rappelAt;

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
            $voiture->setClient($this);
        }

        return $this;
    }

    public function removeVoiture(Voiture $voiture): self
    {
        if ($this->voitures->removeElement($voiture)) {
            // set the owning side to null (unless already changed)
            if ($voiture->getClient() === $this) {
                $voiture->setClient(null);
            }
        }

        return $this;
    }

    public function getIdvoiture(): ?array
    {
        return $this->idvoiture;
    }

    public function setIdvoiture(array $idvoiture): self
    {
        $this->idvoiture = $idvoiture;

        return $this;
    }
}
