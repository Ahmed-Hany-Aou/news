<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CategoryServiceInterface;
use App\Services\EnhancedCategoryService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryServiceInterface::class, EnhancedCategoryService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
