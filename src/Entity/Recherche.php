<?php

namespace App\Entity;

use App\Repository\RechercheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RechercheRepository::class)
 */
class Recherche
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;
    

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $years;

    /**
     * @ORM\Column(type="integer")
     */
    private $km;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $option1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $budget;

    /**
     * @ORM\ManyToOne(targetEntity=Recherche::class, inversedBy="recherches")
     */
    private $options;

    /**
     * @ORM\OneToMany(targetEntity=Recherche::class, mappedBy="options")
     */
    private $recherches;

    /**
     * @ORM\ManyToOne(targetEntity=Recherche::class, inversedBy="modele")
     */
    private $recherche;

    /**
     * @ORM\OneToMany(targetEntity=Recherche::class, mappedBy="recherche")
     */
    private $modele;

    /**
     * @ORM\OneToMany(targetEntity=Marque::class, mappedBy="recherche")
     */
    private $marques;

    public function __construct()
    {
        $this->recherches = new ArrayCollection();
        $this->modele = new ArrayCollection();
        $this->marques = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

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



    

    public function getYears(): ?string
    {
        return $this->years;
    }

    public function setYears(string $years): self
    {
        $this->years = $years;

        return $this;
    }

    public function getKm(): ?int
    {
        return $this->km;
    }

    public function setKm(int $km): self
    {
        $this->km = $km;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getOption1(): ?string
    {
        return $this->option1;
    }

    public function setOption1(string $option1): self
    {
        $this->option1 = $option1;

        return $this;
    }

    public function getBudget(): ?string
    {
        return $this->budget;
    }

    public function setBudget(string $budget): self
    {
        $this->budget = $budget;

        return $this;
    }

    public function getOptions(): ?self
    {
        return $this->options;
    }

    public function setOptions(?self $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getRecherches(): Collection
    {
        return $this->recherches;
    }

    public function addRecherch(self $recherch): self
    {
        if (!$this->recherches->contains($recherch)) {
            $this->recherches[] = $recherch;
            $recherch->setOptions($this);
        }

        return $this;
    }

    public function removeRecherch(self $recherch): self
    {
        if ($this->recherches->removeElement($recherch)) {
            // set the owning side to null (unless already changed)
            if ($recherch->getOptions() === $this) {
                $recherch->setOptions(null);
            }
        }

        return $this;
    }

    public function getRecherche(): ?self
    {
        return $this->recherche;
    }

    public function setRecherche(?self $recherche): self
    {
        $this->recherche = $recherche;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getModele(): Collection
    {
        return $this->modele;
    }

    public function addModele(self $modele): self
    {
        if (!$this->modele->contains($modele)) {
            $this->modele[] = $modele;
            $modele->setRecherche($this);
        }

        return $this;
    }

    public function removeModele(self $modele): self
    {
        if ($this->modele->removeElement($modele)) {
            // set the owning side to null (unless already changed)
            if ($modele->getRecherche() === $this) {
                $modele->setRecherche(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Marque[]
     */
    public function getMarques(): Collection
    {
        return $this->marques;
    }

    public function addMarque(Marque $marque): self
    {
        if (!$this->marques->contains($marque)) {
            $this->marques[] = $marque;
            $marque->setRecherche($this);
        }

        return $this;
    }

    public function removeMarque(Marque $marque): self
    {
        if ($this->marques->removeElement($marque)) {
            // set the owning side to null (unless already changed)
            if ($marque->getRecherche() === $this) {
                $marque->setRecherche(null);
            }
        }

        return $this;
    }

}
