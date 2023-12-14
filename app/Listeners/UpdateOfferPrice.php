<?php

namespace App\Listeners;

use App\Events\RelationsOfProductAndOffersFound;
use App\Services\OfferService;
use App\Services\ProductService;
use Illuminate\Support\Facades\Log;

class UpdateOfferPrice
{
    /**
     * Create the event listener.
     */
    public function __construct(private ProductService $productService, private OfferService $offerService)
    {}

    /**
     * Handle the event.
     */
    public function handle(RelationsOfProductAndOffersFound $event): void
    {
        $offerId = $event->offerId;

        $product = $this->productService->getProduct($event->productId);
        $newOfferPrice = $product->getPrice();

        $this->offerService->updatePrice($event->offerId, $newOfferPrice);

        Log::info("Atualização do preço do anúncio ID {$offerId} para '{$newOfferPrice}'");
    }
}
