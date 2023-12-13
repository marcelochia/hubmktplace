<?php

namespace App\Jobs;

use App\Entities\Product;
use App\Events\ProductUpdated;
use App\Intefaces\ProductRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UpdateProductFromPlatformJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Product $productFromPlatform)
    {}

    /**
     * Execute the job.
     */
    public function handle(ProductRepository $productRepository): void
    {
        $productRepository->update($this->productFromPlatform);

        Log::info("Produto {$this->productFromPlatform->getReference()} atualizado no banco de dados.");

        $product = $productRepository->findByReference($this->productFromPlatform->getReference());

        ProductUpdated::dispatch($product->getId());
    }
}
