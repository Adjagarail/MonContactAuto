<?php

namespace App\Entity;

use App\Repository\PresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PresRepository::class)
 */
class Pres
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $desription;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesription(): ?string
    {
        return $this->desription;
    }

    public function setDesription(?string $desription): self
    {
        $this->desription = $desription;

        return $this;
    }
}
