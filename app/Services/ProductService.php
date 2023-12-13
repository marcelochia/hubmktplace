<?php

namespace App\Services;

use App\Entities\Product;
use App\Exceptions\EntityNotFoundException;
use App\Intefaces\ProductRepository;

class ProductService
{
    public function __construct(private ProductRepository $repository)
    {}

    /** @throws EntityNotFoundException quando o produto não for encontrado */
    public function getProduct(int $productId): Product
    {
        $product = $this->repository->get($productId);

        if (is_null($product)) {
            throw new EntityNotFoundException('Produto não encontrado.');
        }

        return $product;
    }

    public function updatePrice(Product $product, float $newPrice): void
    {
        $product->changePrice($newPrice);

        $this->repository->update($product);
    }
}
