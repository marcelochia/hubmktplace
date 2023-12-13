<?php

namespace App\Jobs;

use App\Enums\ProductStatusEnum;
use App\Services\OfferService;
use App\Services\ProductService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UpdateOfferStatusJob implements ShouldQueue
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

        $statusIsUpdatedInOffer = $offerService::statusIsUpdatedInOffer($offer->getStatus(), $product->getStatus());

        if ($statusIsUpdatedInOffer) {
            return;
        }

        $oldOfferStatus = $offer->getStatus();

        $offerService->updateOfferStatusFromProductStatus($offer, ProductStatusEnum::tryFrom($product->getStatus()));

        Log::info("Atualização do status do anúncio {$offer->getReference()} de '$oldOfferStatus' para '{$offer->getStatus()}'");
    }
}
