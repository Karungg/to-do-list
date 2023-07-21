<?php

namespace App\Providers;

use App\Services\Impl\UserServicesImpl;
use App\Services\UserServices;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServicesProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        UserServices::class => UserServicesImpl::class
    ];

    public function provides(): array
    {
        return [UserServices::class];
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
