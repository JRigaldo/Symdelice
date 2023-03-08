<?php

namespace App\Entity;

use App\Repository\FlavorRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Cocur\Slugify\Slugify;

#[ORM\Entity(repositoryClass: FlavorRepository::class)]
#[UniqueEntity('id')]
class Flavor
{

    const INSTOCK = [
        0 => 'Out of stock',
        1 => 'In stock'
    ];

    const ISTOPPING = [
        0 => 'No',
        1 => 'Yes'
    ];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    #[Assert\Length(
    min: 2,
    max: 50,
    minMessage: 'Votre glace doit contenir au moins {{ limit }} caractères',
    maxMessage: 'Votr glace ne peut pas contenir plus de {{ limit }} caractères',
    )]
    private ?string $name = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    #[Assert\LessThan(200)]
    private ?float $price = null;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $stock = true;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $topping = false;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct(){
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): string
    {
        return (new Slugify())->slugify($this->name);
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getFormatedPrice(): string
    {
        return number_format($this->getPrice(), 2, '.', ' ');
    }

    public function isStock(): ?bool
    {
        return $this->stock;
    }

    public function setStock(bool $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getInStock(): string
    {
        return self::INSTOCK[$this->isStock()];
    }

    public function isTopping(): ?bool
    {
        return $this->topping;
    }

    public function setTopping(bool $topping): self
    {
        $this->topping = $topping;

        return $this;
    }

    public function getisTopping(): string
    {
        return self::ISTOPPING[$this->isStock()];
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
