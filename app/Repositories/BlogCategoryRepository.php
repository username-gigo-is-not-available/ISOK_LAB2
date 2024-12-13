<?php

namespace App\Repositories;
use App\Models\BlogCategory;

class BlogCategoryRepository implements IBlogCategoryRepository
{

    public function all()
    {
        return BlogCategory::all();
    }

    public function find(int $id)
    {
        return BlogCategory::findOrFail($id);
    }

    public function create(array $data)
    {
        return BlogCategory::create($data);
    }

    public function update(int $id, array $data)
    {
        return BlogCategory::whereId($id)->update($data);
    }

    public function delete(int $id)
    {
        return BlogCategory::destroy($id);
    }
}
