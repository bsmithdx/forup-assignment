<?php

namespace App\Providers;

use App\Services\ApiOfIceAndFireService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ApiOfIceAndFireService::class, function ($app) {
            return new ApiOfIceAndFireService(
                new Client([
                    'base_uri' => 'https://anapioficeandfire.com/api/'
                ])
            );
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
