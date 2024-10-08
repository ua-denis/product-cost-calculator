<?php

namespace App\Providers;

use App\Services\MarkupsDiscounts\MarkupDiscountFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(MarkupDiscountFactory::class, function ($app) {
            return new MarkupDiscountFactory();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
