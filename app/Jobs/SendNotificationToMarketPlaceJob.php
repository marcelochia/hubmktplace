<?php

namespace App\Jobs;

use App\Gateway\MarketplaceGateway;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendNotificationToMarketPlaceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected string $offerReference)
    {}

    /**
     * Execute the job.
     */
    public function handle(MarketplaceGateway $marketplaceGateway): void
    {

        Log::info("Enviando notificação para o marketplace do anúncio '{$this->offerReference}'");

        try {
            $marketplaceGateway->sendOfferNotification($this->offerReference);

            Log::info("Notificação enviada para o marketplace do anúncio '{$this->offerReference}'");
        } catch (\Exception $e) {
            $this->fail($e);
            Log::info("Não foi possível consultar o produto com a referência {$this->offerReference} na plataforma.");
            return;
        }
    }
}
