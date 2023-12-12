<?php

namespace App\Intefaces;

use App\Entities\Relation;

interface RelationRepository
{
    /**
     * @return Relation[]
     */
    public function findByProductId(int $productId): array;
}
