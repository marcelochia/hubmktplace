<?php

namespace App\Jobs;

use App\Services\OfferService;
use App\Services\ProductService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UpdateProductPromotionDatesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected int $productId, protected int $offerId)
    {}

    /**
     * Execute the job.
     */
    public function handle(OfferService $offerService, ProductService $productService): void
    {
        $offer = $offerService->getOffer($this->offerId);
        $product = $productService->getProduct($this->productId);

        if (($product->getPromotionStartsOn() === $offer->getSaleStartsOn()) && ($product->getPromotionalEndsOn() === $offer->getSaleEndsOn())) {
            return;
        }

        $oldProductPromotionStartDate = $product->getPromotionStartsOn();
        $oldProductPromotionEndDate = $product->getPromotionalEndsOn();

        $productService->updatePromotionalPrice($product, $offer->getSalePrice());

        Log::info("Atualização do período promocional do produto {$product->getReference()} de '$oldProductPromotionStartDate até $oldProductPromotionEndDate' para '{$product->getPromotionStartsOn()} até {$product->getPromotionalEndsOn()}'");
    }
}
