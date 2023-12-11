<?php

namespace Database\Seeders;

use App\Models\Relation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $relations = [
            [
                'product_id' => 1,
                'offer_id'   => 1,
            ],
            [
                'product_id' => 1,
                'offer_id'   => 2,
            ],
            [
                'product_id' => 2,
                'offer_id'   => 3,
            ],
            [
                'product_id' => 3,
                'offer_id'   => 4,
            ]
        ];

        foreach ($relations as $relation) {
            Relation::create($relation);
        }
    }
}
