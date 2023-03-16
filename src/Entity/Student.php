<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\Column]
    #[Assert\NotBlank(message:"Le numéro est obligatoire")]
    private ?int $nsc = null;

    
    #[ORM\Column(length: 255)]
    #[Assert\Email(message:"Email Invalid")]
    #[Assert\NotBlank(message:"Email est obligatoire")]
    private ?string $email = null;

   

    public function getNsc(): ?int
    {
        return $this->nsc;
    }

    public function setNsc(int $nsc): self
    {
        $this->nsc = $nsc;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
