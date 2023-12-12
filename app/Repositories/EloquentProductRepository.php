<?php

namespace App\Repositories;

use App\Entities\Platform\Product;
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

    public function update(Product $product): void
    {
        /** @var ProductModel $registry */
        $registry = $this->model::where('reference', $product->reference)->first();

        $registry->price = $product->price;
        $registry->status = $product->status;
        $registry->quantity = $product->quantity;
        $registry->save();
    }
}
