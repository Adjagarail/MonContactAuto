<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestRepository::class)
 */
class Test
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $test = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTest(): ?array
    {
        return $this->test;
    }

    public function setTest(array $test): self
    {
        $this->test = $test;

        return $this;
    }
}
