<?php

namespace App\Jobs;

use App\Entities\Product;
use App\Intefaces\ProductRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UpdateProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Product $product)
    {}

    /**
     * Execute the job.
     */
    public function handle(ProductRepository $productRepository): void
    {
        $productRepository->update($this->product);

        Log::info("Produto {$this->product->reference} atualizado no banco de dados.");
    }
}
