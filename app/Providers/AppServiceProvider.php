<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\QrCodeService;
use App\Contracts\IQrCodeService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IQrCodeService::class, QrCodeService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
