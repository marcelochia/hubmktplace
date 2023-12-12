<?php

namespace App\Listeners;

use App\Events\PlatformNotificationReceived;
use App\Jobs\GetProductInformationJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class GetProductInformation
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {}

    /**
     * Handle the event.
     */
    public function handle(PlatformNotificationReceived $event): void
    {
        GetProductInformationJob::dispatch($event->productReference);

        Log::info("Enviado o produto {$event->productReference} para a fila de processamento.");
    }
}
