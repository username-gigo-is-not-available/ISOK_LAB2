<?php

namespace App\Providers;

use BlogCategoryRepository;
use BlogRepository;
use IBlogCategoryRepository;
use IBlogRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
//        $this->app->bind(IBlogCategoryRepository::class, BlogCategoryRepository::class);
//
//        $this->app->bind(IBlogRepository::class, BlogRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
