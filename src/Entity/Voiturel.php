<?php

namespace App\Entity;

use App\Repository\VoiturelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoiturelRepository::class)
 */
class Voiturel
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
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $autreville;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date1;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date2;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAutreville(): ?string
    {
        return $this->autreville;
    }

    public function setAutreville(string $autreville): self
    {
        $this->autreville = $autreville;

        return $this;
    }

    public function getDate1(): ?\DateTimeInterface
    {
        return $this->date1;
    }

    public function setDate1(\DateTimeInterface $date1): self
    {
        $this->date1 = $date1;

        return $this;
    }

    public function getDate2(): ?\DateTimeInterface
    {
        return $this->date2;
    }

    public function setDate2(\DateTimeInterface $date2): self
    {
        $this->date2 = $date2;

        return $this;
    }
}
