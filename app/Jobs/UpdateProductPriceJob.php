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

class UpdateProductPriceJob implements ShouldQueue
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
        $product = $productService->getProduct($this->productId);

        $offer = $offerService->getOffer($this->offerId);

        Log::debug('preços', [
            'product' => $product->getPrice(),
            'offer' => $offer->getPrice(),
        ]);

        if ($product->getPrice() === $offer->getPrice()) {
            return;
        }

        $oldProductPrice = $product->getPrice();

        $productService->updatePrice($product, $offer->getPrice());

        Log::info("Atualização do preço do produto {$product->getReference()} de '$oldProductPrice' para '{$product->getPrice()}'");
    }
}
