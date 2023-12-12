<?php

namespace App\Repositories;

use App\Entities\Relation;
use App\Intefaces\RelationRepository;
use App\Models\Relation as RelationModel;
use Illuminate\Database\Eloquent\Model;

class EloquentRelationRepository implements RelationRepository
{
    private Model $model;

    public function __construct()
    {
        $this->model = new RelationModel();
    }

    public function findByProductId(int $productId): array
    {
        $records = $this->model::where('product_id', $productId)->get();

        if (count($records) === 0) {
            return [];
        }

        $relations = [];

        foreach ($records as $relation) {
            $relations[] = new Relation(
                id: $relation->id,
                offerId: $relation->offer_id,
                productId: $relation->product_id
            );
        }

        return $relations;
    }
}
