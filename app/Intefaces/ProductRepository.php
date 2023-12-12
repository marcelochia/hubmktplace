<?php

namespace App\Intefaces;

use App\Entities\Product;

interface ProductRepository
{
    public function findByReference(string $reference): ?Product;
    public function update(Product $product): void;
}
