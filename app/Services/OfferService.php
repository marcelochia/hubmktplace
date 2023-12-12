<?php

namespace App\Services;

use App\Entities\Offer;
use App\Entities\Product;
use App\Enums\OfferStatusEnum;
use App\Enums\ProductStatusEnum;
use App\Intefaces\OfferRepository;
use App\Intefaces\ProductRepository;

class OfferService
{
    public function __construct(private OfferRepository $offerRepository, private ProductRepository $productRepository)
    {}

    public function updateOfferStatus(int $offerId, int $productId): void
    {
    }
}
