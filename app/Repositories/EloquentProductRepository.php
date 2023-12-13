<?php

namespace App\Repositories;

use App\Entities\Product;
use App\Intefaces\ProductRepository;
use App\Models\Product as ProductModel;
use Illuminate\Database\Eloquent\Model;

class EloquentProductRepository implements ProductRepository
{
    private Model $model;

    public function __construct()
    {
        $this->model = new ProductModel();
    }

    public function get(int $id): ?Product
    {
        /** @var ProductModel $registry */
        $registry = $this->model::find($id);

        if (is_null($registry)) {
            return null;
        }

        $product = new Product(
            reference: $registry->reference,
            title: $registry->title,
            status: $registry->status,
            price: $registry->price,
            promotionalPrice: $registry->promotional_price,
            promotionStartsOn: $registry->promotion_starts_on,
            promotionEndsOn: $registry->promotion_ends_on,
            quantity: $registry->quantity
        );
        $product->setId($registry->id);

        return $product;
    }

    public function findByReference(string $reference): ?Product
    {
        /** @var ProductModel $product */
        $product = $this->model::where('reference', $reference)->first();

        if (is_null($product)) {
            return null;
        }

        return new Product(
            reference: $product->reference,
            title: $product->title,
            status: $product->status,
            price: $product->price,
            promotionalPrice: $product->promotional_price,
            promotionStartsOn: $product->promotion_starts_on,
            promotionEndsOn: $product->promotion_ends_on,
            quantity: $product->quantity
        );
    }

    public function update(Product $product): void
    {
        /** @var ProductModel $registry */
        $registry = $this->model::where('reference', $product->reference)->first();

        $registry->price = $product->price;
        $registry->status = $product->status;
        $registry->quantity = $product->quantity;
        $registry->save();

        $product->setId($registry->id);
    }
}
