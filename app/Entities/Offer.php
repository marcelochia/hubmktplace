<?php

namespace App\Entities;

class Offer extends BaseEntity
{
    private readonly int $id;
    private string $reference;
    private string $title;
    private string $status;
    private float $price;
    private ?float $salePrice;
    private ?\DateTime $saleStartsOn;
    private ?\DateTime $saleEndsOn;
    private int $stock;

    public function __construct(string $reference,
        string $title,
        string $status,
        float $price,
        ?float $salePrice,
        ?\DateTime $saleStartsOn,
        ?\DateTime $saleEndsOn,
        int $stock
    )
    {
        $this->reference = $reference;
        $this->title = $title;
        $this->status = $status;
        $this->price = $price;
        $this->salePrice = $salePrice;
        $this->saleStartsOn = $saleStartsOn;
        $this->saleEndsOn = $saleEndsOn;
        $this->stock = $stock;
    }

    public function setId($id): void
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

    public function getSalePrice(): ?float
    {
        return $this->salePrice;
    }

    public function changeSalePrice(?float $salePrice): void
    {
        $this->salePrice = $salePrice;
    }

    public function getSaleStartsOn(): ?\DateTime
    {
        return $this->saleStartsOn;
    }

    public function changeSaleStartsOn(?\DateTime $saleStartsOn): void
    {
        $this->saleStartsOn = $saleStartsOn;

    }

    public function getSaleEndsOn(): ?\DateTime
    {
        return $this->saleEndsOn;
    }

    public function changeSaleEndsOn(?\DateTime $saleEndsOn): void
    {
        $this->saleEndsOn = $saleEndsOn;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function changeStock(int $stock): void
    {
        $this->stock = $stock;
    }
}
