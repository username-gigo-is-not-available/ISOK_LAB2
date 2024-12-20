<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Observers\BlogCategoryObserver;
use App\Observers\BlogObserver;
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
        Blog::observe(BlogObserver::class);
        BlogCategory::observe(BlogCategoryObserver::class);
    }
}
