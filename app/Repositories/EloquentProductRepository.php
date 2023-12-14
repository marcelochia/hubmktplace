<?php

namespace App\Repositories;

use App\Dto\ProductDto;
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
        /** @var ProductModel $registry */
        $registry = $this->model::where('reference', $reference)->first();

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

    public function update(int $id, ProductDto $data): void
    {
        /** @var ProductModel $registry */
        $registry = $this->model::find($id);

        $registry->title = $data->title;
        $registry->status = $data->status;
        $registry->price = $data->price;
        $registry->promotional_price = $data->promotionalPrice;
        $registry->promotion_starts_on = $data->promotionStartsOn;
        $registry->promotion_ends_on = $data->promotionEndsOn;
        $registry->quantity = $data->quantity;
        $registry->save();
    }
}
