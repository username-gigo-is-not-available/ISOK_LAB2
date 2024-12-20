<?php

namespace App\Models;

use App\Observers\BlogCategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(BlogCategoryObserver::class)]
class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    protected $visible = ['id', 'name', 'slug'];


    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

}


