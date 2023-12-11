<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offers = [
            [
                'reference'      => 'cra-001',
                'title'          => 'Camiseta regata 100% algodão',
                'status'         => 'active',
                'price'          => 29.90,
                'sale_price'     => 19.90,
                'sale_starts_on' => '2023-01-01 00:00:00',
                'sale_ends_on'   => '2023-12-31 23:59:59',
                'stock'          => 10,
            ],
            [
                'reference'      => 'crvc-001',
                'title'          => 'Camiseta regata várias cores',
                'status'         => 'active',
                'price'          => 29.90,
                'sale_price'     => 19.90,
                'sale_starts_on' => '2023-01-01 00:00:00',
                'sale_ends_on'   => '2023-12-31 23:59:59',
                'stock'          => 10,
            ],
            [
                'reference'      => 'cdrtu-001',
                'title'          => 'Cropped de renda tamanho único',
                'status'         => 'active',
                'price'          => 29.90,
                'sale_price'     => null,
                'sale_starts_on' => null,
                'sale_ends_on'   => null,
                'stock'          => 12,
            ],
            [
                'reference'      => 'cjtu-001',
                'title'          => 'Calça jeans tamanho único',
                'status'         => 'paused',
                'price'          => 299.99,
                'sale_price'     => 249.90,
                'sale_starts_on' => '2023-01-01 00:00:00',
                'sale_ends_on'   => '2023-12-31 23:59:59',
                'stock'          => 5,
            ],
            [
                'reference'      => 'bjtu-001',
                'title'          => 'Bermuda jeans tamanho único',
                'status'         => 'paused',
                'price'          => 59.90,
                'sale_price'     => null,
                'sale_starts_on' => null,
                'sale_ends_on'   => null,
                'stock'          => 0,
            ]
        ];

        foreach ($offers as $offer) {
            Offer::create($offer);
        }
    }
}
