<?php

namespace App\Providers;

use App\Services\FetchCurrencylayerQuotesService;
use App\Services\FetchMockExternalQuotesService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(FetchMockExternalQuotesService::class, function($app){
            return new FetchMockExternalQuotesService();
        });

        $this->app->singleton(FetchCurrencylayerQuotesService::class, function($app){
            return new FetchCurrencylayerQuotesService();
        });

        $this->app->bind(
            'App\Contracts\FetchExternalQuotesContract',
            // FetchMockExternalQuotesService::class
            FetchCurrencylayerQuotesService::class
        );
    }
}
