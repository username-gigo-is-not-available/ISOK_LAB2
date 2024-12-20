<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\SlugGenerator;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    protected BlogCategoryRepository $blogCategoryRepository;

    /**
     * @param BlogCategoryRepository $blogCategoryRepository
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
        $searchTerm = $request->input('search');
        $blogCategories = BlogCategory::when($searchTerm, function ($query, $searchTerm) {
            return $query->where('name', 'like', '%' . $searchTerm . '%');
        })->get();


        return view('blog_categories.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:blog_categories|string',
        ]);

        $validatedData['slug'] = SlugGenerator::slugify($validatedData['name']);

        $this->blogCategoryRepository->create($validatedData);

        return redirect()->route('blog_categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        $blogs = $blogCategory->blogs;
        return view('blog_categories.show', compact('blogs', 'blogCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view('blog_categories.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:blog_categories|string',
        ]);

        $validatedData['slug'] = SlugGenerator::slugify($validatedData['name']);

        $this->blogCategoryRepository->update($blogCategory->id, $validatedData);

        return redirect()->route('blog_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        $this->blogCategoryRepository->delete($blogCategory->id);

        return redirect()->route('blog_categories.index');
    }
}
