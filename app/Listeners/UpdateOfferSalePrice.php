<?php

namespace App\Listeners;

use App\Events\RelationsOfProductAndOffersFound;
use App\Services\OfferService;
use App\Services\ProductService;
use Illuminate\Support\Facades\Log;

class UpdateOfferSalePrice
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
        $newSalePrice = $product->getPromotionalPrice();

        $this->offerService->updateSalePrice($offerId, $newSalePrice);

        Log::info("Atualização do preço promocional do anúncio ID $offerId para '$newSalePrice'");
    }
}
