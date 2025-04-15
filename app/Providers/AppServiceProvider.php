<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CategoryServiceInterface;
use App\Services\EnhancedCategoryService;
use App\Repositories\SubDistrictRepository;
use App\Repositories\SubDistrictRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\PostRepository;
use App\Services\DistrictServiceInterface;
use App\Services\DistrictService;
use App\Repositories\DistrictRepositoryInterface;
use App\Repositories\DistrictRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryServiceInterface::class, EnhancedCategoryService::class);
        $this->app->bind(SubDistrictRepositoryInterface::class, SubDistrictRepository::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(DistrictServiceInterface::class, DistrictService::class);
        // Bind the repository interface to its implementation
        $this->app->bind(DistrictRepositoryInterface::class, DistrictRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}