<?php

namespace App\Listeners;

use App\Enums\ProductStatusEnum;
use App\Events\RelationsOfProductAndOffersFound;
use App\Services\OfferService;
use App\Services\ProductService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UpdateOfferStatus
{
    /**
     * Create the event listener.
     */
    public function __construct(private OfferService $offerService, private ProductService $productService)
    {}

    /**
     * Handle the event.
     */
    public function handle(RelationsOfProductAndOffersFound $event): void
    {
        $offerId = $event->offerId;
        $product = $this->productService->getProduct($event->productId);

        $newStatus = $product->getStatus();

        $this->offerService->updateOfferStatusFromProductStatus($offerId, ProductStatusEnum::tryFrom($newStatus));

        Log::info("Atualização do status do anúncio ID $offerId para '$newStatus'");
    }
}
