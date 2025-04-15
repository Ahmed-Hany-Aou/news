<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Services\PostServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
//use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    protected PostServiceInterface $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    // Show all posts
    public function index(): View
    {
        $posts = $this->postService->getAllPosts();
        return view('backend.post.index', compact('posts'));
    }

    // Show create post form
    public function create(): View
    {
        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();
        return view('backend.post.create', compact('category', 'district'));
    }

    // Store a new post
    public function store(PostRequest $request): RedirectResponse
    {
        $data = $request->only([
            'title_en', 'title_hin', 'category_id', 'subcategory_id', 'district_id',
            'subdistrict_id', 'tags_en', 'tags_hin', 'details_en', 'details_hin', 'headline',
            'first_section', 'first_section_thumbnail', 'bigthumbnail', 'image'
        ]);
    
        // Add the authenticated user's ID to the data
        $data['user_id'] = Auth::id();  // Get the authenticated user's ID
    
        // Store the post using the Post model
        Post::create($data);
    
        return redirect()->route('all.post')->with([
            'message' => 'Post Inserted Successfully',
            'alert-type' => 'success'
        ]);
    }

    // Show edit post form
    public function edit($id): View
    {
        $post = $this->postService->getPostById($id); // Ensure this returns the post
        if (!$post) {
            abort(404, 'Post not found'); // Handle case where post is not found
        }

        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();
        return view('backend.post.edit', compact('post', 'category', 'district'));
    }

    // Update an existing post
    public function update(PostRequest $request, $id): RedirectResponse
    {
        $data = $request->only([
            'title_en', 'title_hin', 'category_id', 'subcategory_id', 'district_id',
            'subdistrict_id', 'tags_en', 'tags_hin', 'details_en', 'details_hin', 'headline',
            'first_section', 'first_section_thumbnail', 'bigthumbnail', 'image'
        ]);

        $this->postService->updatePost($data, $id);

        return redirect()->route('all.post')->with([
            'message' => 'Post Updated Successfully',
            'alert-type' => 'success'
        ]);
    }

    // Delete a post
    public function destroy($id): RedirectResponse
    {
        $this->postService->deletePost($id);

        return redirect()->route('all.post')->with([
            'message' => 'Post Deleted Successfully',
            'alert-type' => 'error'
        ]);
    }

    // Fetch subcategories based on selected category
    public function getSubCategory($category_id)
    {
        $sub = DB::table('subcategories')->where('category_id', $category_id)->get();
        return response()->json($sub);
    }

    // Fetch subdistricts based on selected district
    public function getSubDistrict($district_id)
    {
        $sub = DB::table('subdistricts')->where('district_id', $district_id)->get();
        return response()->json($sub);
    }
}
