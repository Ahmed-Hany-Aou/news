<?php

// app\Providers\RepositoryServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Services\CategoryServiceInterface;
use App\Services\CategoryService;

use App\Repositories\DistrictRepositoryInterface;
use App\Repositories\DistrictRepository;
use App\Services\DistrictServiceInterface;
use App\Services\DistrictService;



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

        $this->app->bind(DistrictRepositoryInterface::class, DistrictRepository::class);
        $this->app->bind(DistrictServiceInterface::class, DistrictService::class);
       // $this->app->bind(\App\Repositories\SubDistrictRepositoryInterface::class, \App\Repositories\SubDistrictRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
    
}

