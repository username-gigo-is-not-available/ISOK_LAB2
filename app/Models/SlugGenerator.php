<?php

namespace App\Models;

use Illuminate\Support\Str;


class SlugGenerator
{
    public static function slugify($text)
    {
        return Str::slug($text);
    }
}
