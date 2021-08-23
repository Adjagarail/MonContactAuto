<?php

namespace App\Entity;

use App\Repository\VoituressRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoituressRepository::class)
 */
class Voituress
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $test;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTest(): ?\DateTimeInterface
    {
        return $this->test;
    }

    public function setTest(\DateTimeInterface $test): self
    {
        $this->test = $test;

        return $this;
    }
}
