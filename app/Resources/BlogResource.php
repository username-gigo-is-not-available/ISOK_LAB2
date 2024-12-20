<?php

namespace App\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\SlugGenerator;

class BlogResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => SlugGenerator::slugify($this->title),
            'content' => $this->content,
            'blog_category_id' => $this->blog_category_id
        ];
    }
}
