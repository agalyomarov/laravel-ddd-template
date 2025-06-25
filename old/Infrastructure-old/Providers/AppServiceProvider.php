<?php

namespace App\Infrastructure\Providers;

use App\Domain\Lead\Repositories\LeadRepositoryInterface;
use App\Infrastructure\Persistence\Lead\Eloquent\EloquentLeadRepository;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LeadRepositoryInterface::class, EloquentLeadRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
