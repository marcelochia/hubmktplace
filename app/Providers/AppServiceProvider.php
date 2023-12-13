<?php

namespace App\Providers;

use App\Intefaces\OfferRepository;
use App\Intefaces\ProductRepository;
use App\Intefaces\RelationRepository;
use App\Repositories\EloquentOfferRepository;
use App\Repositories\EloquentProductRepository;
use App\Repositories\EloquentRelationRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OfferRepository::class, EloquentOfferRepository::class);
        $this->app->bind(ProductRepository::class, EloquentProductRepository::class);
        $this->app->bind(RelationRepository::class, EloquentRelationRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
