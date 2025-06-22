<?php

namespace App\Infrastructure\Providers;

use App\Application\Services\Payment\InvoiceService;
use Illuminate\Support\ServiceProvider;
use App\Domain\Payment\Contracts\Repository\ClientRepositoryInterface;
use App\Domain\Payment\Contracts\Repository\InvoiceRepositoryInterface;
use App\Domain\Payment\Contracts\Service\InvoiceServiceInterface;
use App\Infrastructure\Persistence\Eloquent\Payment\ClientRepository;
use App\Infrastructure\Persistence\Eloquent\Payment\InvoiceRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ClientRepositoryInterface::class,
            ClientRepository::class
        );
        $this->app->bind(
            InvoiceRepositoryInterface::class,
            InvoiceRepository::class
        );
        $this->app->bind(
            InvoiceServiceInterface::class,
            InvoiceService::class
        );
        $this->app->bind(
            \App\Application\Contracts\EventDispatcherInterface::class,
            \App\Infrastructure\Events\LaravelEventDispatcher::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
