<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PostServiceInterface;
use App\Services\PostService;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Services\CategoryServiceInterface;
use App\Services\EnhancedCategoryService;
use App\Services\SubCategoryServiceInterface;
use App\Services\SubCategoryService;
use App\Repositories\SubCategoryRepositoryInterface;
use App\Repositories\SubCategoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Bind the PostServiceInterface to the PostService
        $this->app->bind(PostServiceInterface::class, PostService::class);

        // Correct binding for CategoryRepositoryInterface and CategoryRepository
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        // Bind CategoryServiceInterface to EnhancedCategoryService
        $this->app->bind(
            CategoryServiceInterface::class,
            EnhancedCategoryService::class
        );

        // Bind SubCategoryServiceInterface to SubCategoryService
        $this->app->bind(
            SubCategoryServiceInterface::class,
            SubCategoryService::class
        );

        // Correct binding for SubCategoryRepositoryInterface and SubCategoryRepository
        $this->app->bind(
            SubCategoryRepositoryInterface::class,
            SubCategoryRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
