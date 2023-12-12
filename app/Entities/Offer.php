<?php

namespace App\Entities;

readonly class Offer
{
    public int $id;
    public string $reference;
    public string $title;
    public string $status;
    public float $price;
    public float $salePrice;
    public \DateTime $saleStartsOn;
    public \DateTime $saleEndsOn;
    public int $stock;
}
