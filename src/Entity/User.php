<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity]
class User implements UserInterface
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 180, unique: true)]
    private string $email;

    #[ORM\Column(type: "json")]
    private array $roles = [];

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $googleId = null;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $name = null;

    public function getUserIdentifier(): string
    {
        return $this->email;
    }
    public function getRoles(): array { return $this->roles; }
    public function setRoles(array $roles): self { $this->roles = $roles; return $this; }
    public function eraseCredentials() {}
    // ...otros getters y setters...
}