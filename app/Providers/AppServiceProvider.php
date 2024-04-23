<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\PDF\Internal\{CertificateService, CertificateServiceInterface};
use App\Services\PDF\Repositories\{CertificateRepository, CertificateRepositoryInterface};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CertificateServiceInterface::class, CertificateService::class);
        $this->app->bind(CertificateRepositoryInterface::class, CertificateRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
