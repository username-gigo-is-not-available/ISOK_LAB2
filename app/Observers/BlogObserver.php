<?php

namespace App\Observers;
use Illuminate\Support\Str;


use App\Models\Blog;
use App\Models\SlugGenerator;

class BlogObserver
{
    public function creating(Blog $blog): void
    {

        if (!$blog->id) {
            $blog->id = (string)Str::uuid();
        }

        if (!$blog->slug) {
            $blog->slug = SlugGenerator::slugify($blog->title);
        }
    }

    /**
     * Handle the Blog "updating" event.
     */
    public function updating(Blog $blog): void
    {
        if ($blog->isDirty('title')) {
            $blog->slug = SlugGenerator::slugify($blog->title);
        }
    }
}
