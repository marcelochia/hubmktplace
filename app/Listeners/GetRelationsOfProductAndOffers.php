<?php

namespace App\Listeners;

use App\Events\ProductUpdated;
use App\Events\RelationsOfProductAndOffersFound;
use App\Intefaces\RelationRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class GetRelationsOfProductAndOffers
{
    /**
     * Create the event listener.
     */
    public function __construct(private RelationRepository $relationRepository)
    {}

    /**
     * Handle the event.
     */
    public function handle(ProductUpdated $event): void
    {
        $productId = $event->productId;

        $relations = $this->relationRepository->findByProductId($productId);

        if (empty($relations)) {
            Log::info("Produto $productId sem anúncio.");
            return;
        }

        /** @var \App\Entities\Relation $relation */
        foreach ($relations as $relation) {
            RelationsOfProductAndOffersFound::dispatch($relation->productId, $relation->offerId);
        }
    }
}
