<?php

namespace App\Intefaces;

use App\Entities\Platform\Product;

interface ProductRepository
{
    public function update(Product $product): void;
}
