<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Product
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string")]
    private string $name;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $imageUrl = null;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private float $price = 0;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $scrapedAt;

    #[ORM\ManyToOne(targetEntity: Store::class)]
    private ?Store $store = null;

    #[ORM\ManyToOne(targetEntity: Category::class)]
    private ?Category $category = null;

    // ...getters y setters...
}