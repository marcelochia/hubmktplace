<?php

namespace App\Providers;

use App\Events\PlatformNotificationReceived;
use App\Events\ProductInformationObteined;
use App\Events\ProductUpdated;
use App\Events\RelationsOfProductAndOffersFound;
use App\Listeners\GetProductInformation;
use App\Listeners\UpdateOfferStatus;
use App\Listeners\UpdateProductInDatabase;
use App\Listeners\GetRelationsOfProductAndOffers;
use App\Listeners\SendNotificationToMarketplace;
use App\Listeners\UpdateOfferPrice;
use App\Listeners\UpdateOfferSaleDates;
use App\Listeners\UpdateOfferSalePrice;
use App\Listeners\UpdateOfferStock;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PlatformNotificationReceived::class => [
            GetProductInformation::class,
        ],
        ProductInformationObteined::class => [
            UpdateProductInDatabase::class,
        ],
        ProductUpdated::class => [
            GetRelationsOfProductAndOffers::class,
        ],
        RelationsOfProductAndOffersFound::class => [
            UpdateOfferStatus::class,
            UpdateOfferPrice::class,
            UpdateOfferSalePrice::class,
            UpdateOfferSaleDates::class,
            UpdateOfferStock::class,
            SendNotificationToMarketplace::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
