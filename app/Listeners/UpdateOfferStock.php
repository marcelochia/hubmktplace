<?php

namespace App\Listeners;

use App\Events\RelationsOfProductAndOffersFound;
use App\Services\OfferService;
use App\Services\ProductService;
use Illuminate\Support\Facades\Log;

class UpdateOfferStock
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

        $newStock = $product->getQuantity();

        $this->offerService->updateStock($offerId, $newStock);

        Log::info("Atualização do estoque do anúncio ID $offerId para '$newStock'");
    }
}
