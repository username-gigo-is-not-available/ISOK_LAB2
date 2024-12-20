<?php

namespace App\Models;

use BlogObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(BlogObserver::class)]
class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'blog_category_id'];

    protected $visible = ['id', 'title', 'slug', 'content', 'blog_category_id'];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
}
