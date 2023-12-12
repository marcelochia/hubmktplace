<?php

namespace App\Entities;

readonly class Product
{
    public function __construct(
        public string $reference,
        public string $title,
        public string $status,
        public float $price,
        public float $promotionalPrice,
        public \DateTime $promotionStartsOn,
        public \DateTime $promotionEndsOn,
        public int $quantity,
        public ?int $id = null
    ) {}
}
