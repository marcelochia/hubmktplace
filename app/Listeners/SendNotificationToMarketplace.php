<?php

namespace App\Listeners;

use App\Events\RelationsOfProductAndOffersFound;
use App\Jobs\SendNotificationToMarketPlaceJob;
use App\Services\OfferService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationToMarketplace
{
    /**
     * Create the event listener.
     */
    public function __construct(private OfferService $offerService)
    {}

    /**
     * Handle the event.
     */
    public function handle(RelationsOfProductAndOffersFound $event): void
    {
        $offer = $this->offerService->getOffer($event->offerId);

        SendNotificationToMarketPlaceJob::dispatch($offer->getReference());
    }
}
