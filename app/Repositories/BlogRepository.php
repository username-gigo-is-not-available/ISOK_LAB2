<?php

namespace App\Repositories;

use App\Models\Blog;

class BlogRepository implements IBlogRepository
{

    public function all()
    {
        return Blog::all();
    }

    public function find(int $id)
    {
        return Blog::findOrFail($id);
    }

    public function create(array $data)
    {
        return Blog::create($data);
    }

    public function update(int $id, array $data)
    {
        return Blog::whereId($id)->update($data);
    }

    public function delete(int $id)
    {
        return Blog::destroy($id);
    }
}
