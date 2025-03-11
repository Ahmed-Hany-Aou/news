<?php

// app\Providers\RepositoryServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Services\CategoryServiceInterface;
use App\Services\CategoryService;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
       
        $this->app->bind(
            \App\Repositories\SubCategoryRepositoryInterface::class,
            \App\Repositories\SubCategoryRepository::class
        );
        
        $this->app->bind(
            \App\Services\SubCategoryServiceInterface::class,
            \App\Services\SubCategoryService::class
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

