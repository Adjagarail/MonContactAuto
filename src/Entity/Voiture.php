<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 */
class Voiture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="voitures",orphanRemoval=true, cascade={"persist"})
     */
    private $images;

    /**
     * @ORM\ManyToOne(targetEntity=Marques::class, inversedBy="voitures")
     */
    private $marques;

    /**
     * @ORM\Column(type="integer")
     */
    private $kilometrages;

    /**
     * @ORM\Column(type="integer")
     */
    private $years;


    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $vendre;


    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="voitures")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Typevehicule::class, inversedBy="voitures")
     */
    private $typevehicule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $destiner;

    /**
     * @ORM\Column(type="date", nullable=true)
     *
     */
    private $dispoAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $disposAt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tarif;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tarifs;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $villeL;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autreVille;



    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prix;



    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="voiture")
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $disponible;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $place;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $carburant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $transmission;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateAt;

    /**
     * @ORM\ManyToMany(targetEntity=Option::class, inversedBy="voitures")
     */
    private $options;

    /**
     * @ORM\ManyToMany(targetEntity=Modele::class, inversedBy="voitures")
     */
    private $modeles;






    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->options = new ArrayCollection();
        $this->modeles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setVoitures($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getVoitures() === $this) {
                $image->setVoitures(null);
            }
        }

        return $this;
    }



    public function getMarques(): ?Marques
    {
        return $this->marques;
    }

    public function setMarques(?Marques $marques): self
    {
        $this->marques = $marques;

        return $this;
    }

    public function getKilometrages(): ?int
    {
        return $this->kilometrages;
    }

    public function setKilometrages(int $kilometrages): self
    {
        $this->kilometrages = $kilometrages;

        return $this;
    }

    public function getYears(): ?int
    {
        return $this->years;
    }

    public function setYears(int $years): self
    {
        $this->years = $years;

        return $this;
    }


    public function getVendre(): ?bool
    {
        return $this->vendre;
    }

    public function setVendre(?bool $vendre): self
    {
        $this->vendre = $vendre;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }


    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getTypevehicule(): ?Typevehicule
    {
        return $this->typevehicule;
    }

    public function setTypevehicule(?Typevehicule $typevehicule): self
    {
        $this->typevehicule = $typevehicule;

        return $this;
    }

    public function getDestiner(): ?string
    {
        return $this->destiner;
    }

    public function setDestiner(string $destiner): self
    {
        $this->destiner = $destiner;

        return $this;
    }

    public function getDispoAt(): ?\DateTimeInterface
    {
        return $this->dispoAt;
    }

    public function setDispoAt(?\DateTimeInterface $dispoAt): self
    {
        $this->dispoAt = $dispoAt;

        return $this;
    }

    public function getDisposAt(): ?\DateTimeInterface
    {
        return $this->disposAt;
    }

    public function setDisposAt(\DateTimeInterface $disposAt): self
    {
        $this->disposAt = $disposAt;

        return $this;
    }

    public function getTarif(): ?int
    {
        return $this->tarif;
    }

    public function setTarif(?int $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }
    public function getTarifs(): ?int
    {
        return $this->tarifs;
    }

    public function setTarifs(?int $tarifs): self
    {
        $this->tarifs = $tarifs;

        return $this;
    }

    public function getVilleL(): ?string
    {
        return $this->villeL;
    }

    public function setVilleL(string $villeL): self
    {
        $this->villeL = $villeL;

        return $this;
    }

    public function getAutreVille(): ?string
    {
        return $this->autreVille;
    }

    public function setAutreVille(string $autreVille): self
    {
        $this->autreVille = $autreVille;

        return $this;
    }


    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    public function setVille(?Ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getDisponible(): ?string
    {
        return $this->disponible;
    }

    public function setDisponible(string $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }


    public function getPlace(): ?int
    {
        return $this->place;
    }

    public function setPlace(?int $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(string $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    public function setTransmission(string $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getDateAt(): ?\DateTimeInterface
    {
        return $this->dateAt;
    }

    public function setDateAt(?\DateTimeInterface $dateAt): self
    {
        $this->dateAt = $dateAt;

        return $this;
    }

    /**
     * @return Collection|Option[]
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Option $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
        }

        return $this;
    }

    public function removeOption(Option $option): self
    {
        $this->options->removeElement($option);

        return $this;
    }

    /**
     * @return Collection|Modele[]
     */
    public function getModeles(): Collection
    {
        return $this->modeles;
    }

    public function addModele(Modele $modele): self
    {
        if (!$this->modeles->contains($modele)) {
            $this->modeles[] = $modele;
        }

        return $this;
    }

    public function removeModele(Modele $modele): self
    {
        $this->modeles->removeElement($modele);

        return $this;
    }


    

}
