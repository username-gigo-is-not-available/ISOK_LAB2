<?php

namespace App\Http\Controllers;

use App\Resources\BlogCategoryResource;
use App\Resources\BlogResource;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;

class BlogCategoryAPIController extends Controller
{
    protected BlogCategoryRepository $blogCategoryRepository;

    /**
     * BlogController constructor.
     *
     */
    public function __construct(BlogCategoryRepository $blogCategoryRepository)
    {
        $this->blogCategoryRepository = $blogCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return BlogCategoryResource::collection($this->blogCategoryRepository->all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:blog_categories|string',
        ]);

        return BlogCategoryResource::make($this->blogCategoryRepository->create($validatedData));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return BlogCategoryResource::make($this->blogCategoryRepository->find($id));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:blog_categories|string',
        ]);

        return BlogResource::make($this->blogCategoryRepository->update($id, $validatedData));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->blogCategoryRepository->delete($id);

        return response()->json(null, 204);
    }
}
