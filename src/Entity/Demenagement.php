<?php

namespace App\Entity;

use App\Repository\DemenagementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DemenagementRepository::class)
 */
class Demenagement
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
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villea;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villed;

    /**
     * @ORM\Column(type="datetime")
     */
    private $deposerAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombrepersonne;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionbagage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bagage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateflexible;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transport;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone;


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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getVillea(): ?string
    {
        return $this->villea;
    }

    public function setVillea(string $villea): self
    {
        $this->villea = $villea;

        return $this;
    }

    public function getVilled(): ?string
    {
        return $this->villed;
    }

    public function setVilled(string $villed): self
    {
        $this->villed = $villed;

        return $this;
    }

    public function getDeposerAt(): ?\DateTimeInterface
    {
        return $this->deposerAt;
    }

    public function setDeposerAt(\DateTimeInterface $deposerAt): self
    {
        $this->deposerAt = $deposerAt;

        return $this;
    }

    public function getNombrepersonne(): ?int
    {
        return $this->nombrepersonne;
    }

    public function setNombrepersonne(int $nombrepersonne): self
    {
        $this->nombrepersonne = $nombrepersonne;

        return $this;
    }

    public function getDescriptionbagage(): ?string
    {
        return $this->descriptionbagage;
    }

    public function setDescriptionbagage(string $descriptionbagage): self
    {
        $this->descriptionbagage = $descriptionbagage;

        return $this;
    }

    public function getBagage(): ?string
    {
        return $this->bagage;
    }

    public function setBagage(string $bagage): self
    {
        $this->bagage = $bagage;

        return $this;
    }

    public function getDateflexible(): ?string
    {
        return $this->dateflexible;
    }

    public function setDateflexible(string $dateflexible): self
    {
        $this->dateflexible = $dateflexible;

        return $this;
    }

    public function getTransport(): ?string
    {
        return $this->transport;
    }

    public function setTransport(string $transport): self
    {
        $this->transport = $transport;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

}

