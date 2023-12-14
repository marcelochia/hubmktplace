<?php

namespace App\Dto;

readonly class ProductDto
{
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

    public function toArray(): array
    {
        return [
            'reference' => $this->reference,
            'title' => $this->title,
            'status' => $this->status,
            'price' => $this->price,
            'promotionalPrice' => $this->promotionalPrice,
            'promotionStartsOn' => $this->promotionStartsOn,
            'promotionEndsOn' => $this->promotionEndsOn,
            'quantity' => $this->quantity
        ];
    }
}
