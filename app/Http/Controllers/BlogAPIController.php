<?php
namespace App\Http\Controllers;

use App\Resources\BlogResource;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogRepository;
use App\Repositories\IBlogRepository;
use Illuminate\Http\Request;

class BlogAPIController extends Controller
{
    protected BlogRepository $blogRepository;
    protected BlogCategoryRepository $blogCategoryRepository;

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

        return BlogResource::collection($this->blogRepository->all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:50',
            'blog_category_id' => 'required|exists:blog_categories,id',
        ]);

        return BlogResource::make($this->blogRepository->create($validatedData));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return BlogResource::make($this->blogRepository->find($id));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:50',
            'blog_category_id' => 'required|exists:blog_categories,id',
        ]);

        return BlogResource::make($this->blogRepository->update($id, $validatedData));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->blogRepository->delete($id);

        return response()->json(null, 204);
    }
}
