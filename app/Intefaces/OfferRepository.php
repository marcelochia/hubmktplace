<?php

namespace App\Intefaces;

use App\Entities\Offer;

interface OfferRepository
{
    public function get(int $id): ?Offer;
    public function update(Offer $product): void;
}
