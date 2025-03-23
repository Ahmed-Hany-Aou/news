<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\EnhancedCategoryService; // Ensure this class exists in the specified namespace

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CategoryServiceInterface;
use App\Services\EnhancedCategoryService;
use App\Repositories\SubDistrictRepository;
use App\Repositories\SubDistrictRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryServiceInterface::class, EnhancedCategoryService::class);
        $this->app->bind(SubDistrictRepositoryInterface::class, SubDistrictRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
