<?php

namespace App\Observers;

use App\Models\BlogCategory;
use App\Models\SlugGenerator;
use Illuminate\Support\Str;


class BlogCategoryObserver
{
    /**
     * Handle the BlogCategory "creating" event.
     */
    public function creating(BlogCategory $blogCategory): void
    {
        if (!$blogCategory->id) {
            $blogCategory->id = (string) Str::uuid();
        }
        if (!$blogCategory->slug) {
            $blogCategory->slug = SlugGenerator::slugify($blogCategory->name);
        }
    }

    /**
     * Handle the BlogCategory "updating" event.
     */
    public function updating(BlogCategory $blogCategory): void
    {
        if ($blogCategory->isDirty('name')) {
            $blogCategory->slug = SlugGenerator::slugify($blogCategory->name);
        }
    }
}
