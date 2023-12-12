<?php

namespace App\Entities;

readonly class Product
{
    public int $id;

    public function __construct(
        public string $reference,
        public string $title,
        public string $status,
        public float $price,
        public ?float $promotionalPrice,
        public ?\DateTime $promotionStartsOn,
        public ?\DateTime $promotionEndsOn,
        public int $quantity
    ) {}

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
