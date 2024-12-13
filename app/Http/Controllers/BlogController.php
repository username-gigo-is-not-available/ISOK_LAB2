<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\SlugGenerator;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogRepository;
use App\Repositories\IBlogRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private BlogRepository $blogRepository;
    private BlogCategoryRepository $blogCategoryRepository;

    /**
     * BlogController constructor.
     *
     * @param IBlogRepository $blogRepository
     */
    public function __construct(BlogRepository $blogRepository, BlogCategoryRepository $blogCategoryRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->blogCategoryRepository = $blogCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $categories = $this->blogCategoryRepository->all();


        $categoryId = $request->category;
        $blogs = $this->blogRepository->all();

        if ($categoryId) {
            $category = $this->blogCategoryRepository->find($categoryId);
            $blogs = $category->blogs;
        }


        return view('blogs.index', compact('blogs', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['slug'] = SlugGenerator::slugify($request->title);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required|string|min:50',
            'blog_category_id' => 'required|exists:blog_categories,id',
        ]);
        $this->blogRepository->create($validatedData);

        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = $this->blogRepository->find($id);
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = $this->blogRepository->find($id);
        $categories = BlogCategory::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request['slug'] = SlugGenerator::slugify($request->title);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required|string|min:50',
            'blog_category_id' => 'required|exists:blog_categories,id',
        ]);
        $this->blogRepository->update($id, $validatedData);

        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->blogRepository->delete($id);

        return redirect()->route('blogs.index');
    }
}
