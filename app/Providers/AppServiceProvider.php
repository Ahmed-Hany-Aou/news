<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CategoryServiceInterface;
use App\Services\EnhancedCategoryService;
use App\Repositories\SubDistrictRepository;
use App\Repositories\SubDistrictRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\PostRepository;

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
       // $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}