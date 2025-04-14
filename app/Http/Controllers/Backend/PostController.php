<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Facades\Image;
use Intervention\Image\Facades\Image as Image;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $post = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
            ->join('districts', 'posts.district_id', 'districts.id')
            ->join('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
            ->select('posts.*', 'categories.category_en', 'subcategories.subcategory_en', 'districts.district_en', 'subdistricts.subdistrict_en')
            ->orderBy('id', 'desc')->paginate(5);

        return view('backend.post.index', compact('post'));
    }

    public function create()
    {
        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();
        return view('backend.post.create', compact('category', 'district'));
    }

    public function StorePost(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'district_id' => 'required',
        ]);
    
        $data = array();
        $data['title_en'] = $request->title_en;
        $data['title_hin'] = $request->title_hin;
        $data['user_id'] = Auth::id();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['tags_en'] = $request->tags_en;
        $data['tags_hin'] = $request->tags_hin;
        $data['details_en'] = $request->details_en;
        $data['details_hin'] = $request->details_hin;
        $data['headline'] = $request->headline;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date("F");
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_one = uniqid().'.'.$image->getClientOriginalExtension();
            //\Image::make($image)->resize(500, 300)->save("image/postimg/$image_one");
            $data['image'] = 'image/postimg/'.$image_one;
        }
    
        DB::table('posts')->insert($data);
    
        return redirect()->route('all.post')->with([
            'message' => 'Post Inserted Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function editPost($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();
        return view('backend.post.edit', compact('post', 'category', 'district'));
    }

    public function updatePost(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'district_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $this->preparePostData($request);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $this->uploadImage($image, 'postimg');

            // Delete old image
            if ($request->oldimage && file_exists($request->oldimage)) {
                unlink($request->oldimage);
            }

            $data['image'] = $imagePath;
        } else {
            $data['image'] = $request->oldimage;
        }

        DB::table('posts')->where('id', $id)->update($data);

        $notification = [
            'message' => 'Post Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.post')->with($notification);
    }

    public function deletePost($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();

        if ($post && file_exists($post->image)) {
            unlink($post->image);
        }

        DB::table('posts')->where('id', $id)->delete();

        $notification = [
            'message' => 'Post Deleted Successfully',
            'alert-type' => 'error',
        ];

        return redirect()->route('all.post')->with($notification);
    }

    public function getSubCategory($category_id)
    {
        $sub = DB::table('subcategories')->where('category_id', $category_id)->get();
        return response()->json($sub);
    }

    public function getSubDistrict($district_id)
    {
        $sub = DB::table('subdistricts')->where('district_id', $district_id)->get();
        return response()->json($sub);
    }

    private function preparePostData(Request $request)
    {
        return [
            'title_en' => $request->title_en,
            'title_hin' => $request->title_hin,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'district_id' => $request->district_id,
            'subdistrict_id' => $request->subdistrict_id,
            'tags_en' => $request->tags_en,
            'tags_hin' => $request->tags_hin,
            'details_en' => $request->details_en,
            'details_hin' => $request->details_hin,
            'headline' => $request->headline,
            'first_section' => $request->first_section,
            'first_section_thumbnail' => $request->first_section_thumbnail,
            'bigthumbnail' => $request->bigthumbnail,
            'post_date' => date('d-m-Y'),
            'post_month' => date('F'),
        ];
    }

    private function uploadImage($image, $folder)
    {
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        $imagePath = 'image/' . $folder . '/' . $imageName;
      //  \Image::make($image)->resize(500, 300)->save(public_path($imagePath));
        return $imagePath;
    }
}