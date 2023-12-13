<?php

namespace App\Entities;

class Product
{
    private readonly int $id;
    private string $reference;
    private string $title;
    private string $status;
    private float $price;
    private ?float $promotionalPrice;
    private ?\DateTime $promotionStartsOn;
    private ?\DateTime $promotionEndsOn;
    private int $quantity;

    public function __construct(
        string $reference,
        string $title,
        string $status,
        float $price,
        ?float $promotionalPrice,
        ?\DateTime $promotionStartsOn,
        ?\DateTime $promotionEndsOn,
        int $quantity
    )
    {
        $this->reference = $reference;
        $this->title = $title;
        $this->status = $status;
        $this->price = $price;
        $this->promotionalPrice = $promotionalPrice;
        $this->promotionStartsOn = $promotionStartsOn;
        $this->promotionEndsOn = $promotionEndsOn;
        $this->quantity = $quantity;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function changeReference(string $reference): void
    {
        $this->reference = $reference;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function changeTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function changeStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function changePrice(float $price): void
    {
        $this->price = $price;
    }

    public function getPromotionalPrice(): ?float
    {
        return $this->promotionalPrice;
    }

    public function changePromotionalPrice(?float $promotionalPrice): void
    {
        $this->promotionalPrice = $promotionalPrice;
    }

    public function getPromotionStartsOn(): ?\DateTime
    {
        return $this->promotionStartsOn;
    }

    public function getPromotionalEndsOn(): ?\DateTime
    {
        return $this->promotionEndsOn;
    }

    public function changePromotionEndsOn(?\DateTime $promotionEndsOn): void
    {
        $this->promotionEndsOn = $promotionEndsOn;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
