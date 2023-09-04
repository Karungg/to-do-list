<?php

namespace App\Providers;

use App\Services\Impl\TodolistServiceImpl;
use App\Services\TodolistService;
use Illuminate\Support\ServiceProvider;

class TodolistServiceProvider extends ServiceProvider
{
    public array $singletons = [
        TodolistService::class => TodolistServiceImpl::class
    ];

    public function provides(): array
    {
        return [TodolistService::class];
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
