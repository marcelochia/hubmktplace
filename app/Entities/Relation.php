<?php

namespace App\Entities;

readonly class Relation
{
    public function __construct(public int $id, public int $offerId, public int $productId)
    {}
}
