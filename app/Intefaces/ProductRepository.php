<?php

namespace App\Intefaces;

use App\Dto\ProductDto;
use App\Entities\Product;

interface ProductRepository
{
    public function get(int $id): ?Product;
    public function findByReference(string $reference): ?Product;
    public function update(int $id, ProductDto $data): void;
}
