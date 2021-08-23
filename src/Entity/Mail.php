<?php

namespace App\Entity;

use App\Repository\MailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MailRepository::class)
 */
class Mail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Subscribe::class, inversedBy="mails")
     */
    private $abonner;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $object;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAbonner(): ?Subscribe
    {
        return $this->abonner;
    }

    public function setAbonner(?Subscribe $abonner): self
    {
        $this->abonner = $abonner;

        return $this;
    }

    public function getObject(): ?string
    {
        return $this->object;
    }

    public function setObject(string $object): self
    {
        $this->object = $object;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
