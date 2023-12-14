<?php

namespace App\Listeners;

use App\Events\ProductInformationObteined;
use App\Jobs\UpdateProductFromPlatformJob;

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
        UpdateProductFromPlatformJob::dispatch($event->product);
    }
}
