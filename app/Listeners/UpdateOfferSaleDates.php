<?php

namespace App\Listeners;

use App\Events\RelationsOfProductAndOffersFound;
use App\Services\OfferService;
use App\Services\ProductService;
use Illuminate\Support\Facades\Log;

class UpdateOfferSaleDates
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

        $offerSaleStartDate = $product->getPromotionStartsOn();
        $offerSaleEndDate = $product->getPromotionalEndsOn();

        $this->offerService->updateSaleDates($offerId, $offerSaleStartDate, $offerSaleEndDate);

        Log::info("Atualização do período de vendas do anúncio ID $offerId para '$offerSaleStartDate até $offerSaleEndDate'");
    }
}
