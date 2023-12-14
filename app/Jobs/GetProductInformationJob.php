<?php

namespace App\Jobs;

use App\Events\ProductInformationObteined;
use App\Gateway\PlatformGateway;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class GetProductInformationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected string $productReference)
    {}

    /**
     * Execute the job.
     */
    public function handle(PlatformGateway $platformGateway): void
    {
        Log::info('Processando o produto com a referência: ' . $this->productReference);

        try {
            $product = $platformGateway->getProductInformation($this->productReference);

            if (is_null($product)) {
                Log::info("Produto com a referência {$this->productReference} não existe na plataforma.");
                return;
            }

            ProductInformationObteined::dispatch($product);
        } catch (\Exception $e) {
            $this->fail($e);
            Log::info("Não foi possível consultar o produto com a referência {$this->productReference} na plataforma.");
        }
    }
}
