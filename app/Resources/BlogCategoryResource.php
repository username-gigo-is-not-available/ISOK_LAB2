<?php

namespace App\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\SlugGenerator;

class BlogCategoryResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name' => $this->name,
            'slug' => SlugGenerator::slugify($this->name),
        ];
    }
}
