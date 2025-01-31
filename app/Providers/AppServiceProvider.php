<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Property;
use App\Observers\PropertyObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repository\Properties\PropertyService::class,
            \App\Repository\Properties\PropertyRepository::class
        );

        $this->app->bind(
            \App\Repository\Contracts\ContractService::class,
            \App\Repository\Contracts\ContractRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Property::observe(PropertyObserver::class);
    }
}
