<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
               'reference'           => '20231001',
               'title'               => 'Camiseta regata',
               'status'              => 'active',
               'price'               => 29.90,
               'promotional_price'   => 19.90,
               'promotion_starts_on' => '2023-01-01 00:00:00',
               'promotion_ends_on'   => '2023-12-31 23:59:59',
               'quantity'            => 10,
           ],
           [
               'reference'           => '20231002',
               'title'               => 'Cropped de renda',
               'status'              => 'active',
               'price'               => 29.90,
               'promotional_price'   => null,
               'promotion_starts_on' => null,
               'promotion_ends_on'   => null,
               'quantity'            => 12,
           ],
           [
               'reference'           => '20231003',
               'title'               => 'Calça jeans',
               'status'              => 'inactive',
               'price'               => 299.99,
               'promotional_price'   => 249.90,
               'promotion_starts_on' => '2023-01-01 00:00:00',
               'promotion_ends_on'   => '2023-12-31 23:59:59',
               'quantity'            => 5,
           ],
           [
               'reference'           => '20231004',
               'title'               => 'Bermuda cargo',
               'status'              => 'inactive',
               'price'               => 39.99,
               'promotional_price'   => null,
               'promotion_starts_on' => null,
               'promotion_ends_on'   => null,
               'quantity'            => 10,
           ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
