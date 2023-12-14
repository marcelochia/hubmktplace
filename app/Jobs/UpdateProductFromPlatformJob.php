<?php

namespace App\Jobs;

use App\Dto\ProductDto;
use App\Entities\Product;
use App\Events\ProductUpdated;
use App\Exceptions\EntityNotFoundException;
use App\Intefaces\ProductRepository;
use App\Services\ProductService;
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
    public function __construct(protected ProductDto $productFromPlatform)
    {}

    /**
     * Execute the job.
     */
    public function handle(ProductService $productService): void
    {
        try {
            $product = $productService->findProductByReference($this->productFromPlatform->reference);
        } catch (EntityNotFoundException) {
            Log::info("Produto {$this->productFromPlatform->reference} não encontrado no banco de dados.");
            return;
        }

        $productService->updateProduct($product->getId(), $this->productFromPlatform);

        Log::info("Produto ID {$product->getId()} atualizado no banco de dados.");

        ProductUpdated::dispatch($product->getId());
    }
}
