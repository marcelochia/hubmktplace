<?php

namespace App\Listeners;

use App\Events\ProductInformationObteined;
use App\Jobs\UpdateProductJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateProductInDatabase
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {}

    /**
     * Handle the event.
     */
    public function handle(ProductInformationObteined $event): void
    {
        UpdateProductJob::dispatch($event->product);
    }
}