<?php

namespace App\Entity;

use App\Repository\ExpertiseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExpertiseRepository::class)
 */
class Expertise
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
    private $prenomnomvendeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephonev;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephonec;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lien;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adressev;

    /**
     * @ORM\Column(type="text")
     */
    private $infos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modele;

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

    public function getPrenomnomvendeur(): ?string
    {
        return $this->prenomnomvendeur;
    }

    public function setPrenomnomvendeur(string $prenomnomvendeur): self
    {
        $this->prenomnomvendeur = $prenomnomvendeur;

        return $this;
    }

    public function getTelephonev(): ?string
    {
        return $this->telephonev;
    }

    public function setTelephonev(string $telephonev): self
    {
        $this->telephonev = $telephonev;

        return $this;
    }

    public function getTelephonec(): ?string
    {
        return $this->telephonec;
    }

    public function setTelephonec(string $telephonec): self
    {
        $this->telephonec = $telephonec;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getAdressev(): ?string
    {
        return $this->adressev;
    }

    public function setAdressev(string $adressev): self
    {
        $this->adressev = $adressev;

        return $this;
    }

    public function getInfos(): ?string
    {
        return $this->infos;
    }

    public function setInfos(string $infos): self
    {
        $this->infos = $infos;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }
}
