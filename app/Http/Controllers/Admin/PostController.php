<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Category;
use Illuminate\Support\Facades\Auth;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('login');
    }

    public function index()
    {
        $posts = Post::with('category', 'user')->get();

        return response()->json([
            'posts' => $posts
        ], 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts',
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        if ($request->image) {
            $position = strpos($request->image, ';');
            $sub = substr($request->image, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time() . "." . $ext;
            $img = Image::make($request->image)->resize(280, 200);
            $upload_path = 'upload/post/';
            $image_url = $upload_path . $name;
            $img->save($image_url);

            $post = new Post;
            $post->title = $request->title;
            $post->category_id = $request->category_id;
            $post->description = $request->description;
            $post->image = $image_url;
            $post->user_id = 1;
            $post->save();
            return response()->json([
                'success' => 'created successfully.'
            ]);
        } else {
            $post = new Post;
            $post->title = $request->title;
            $post->category_id = $request->category_id;
            $post->description = $request->description;
            $post->user_id = 1;
            $post->save();
            return response()->json([
                'success' => 'created successfully.'
            ]);
        }


    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->with('category')->firstOrfail();
        $categories = Category::all();
        return response()->json([
            'post' => $post,
            'categories' => $categories
        ], 200);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|unique:posts',
            'category_id' => 'required',
            'description' => 'required'
        ]);
        $post = Post::findOrfail($id);
        if ($request->image != $post->image) {
            $position = strpos($request->image, ';');
            $sub = substr($request->image, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time() . "." . $ext;
            $img = Image::make($request->image)->resize(280, 200);
            $upload_path = 'upload/post/';
            $image_url = $upload_path . $name;
            $success = $img->save($image_url);
            if ($success) {
                $img = $post;
                $img_path = $img->image;
                unlink($img_path);


                $post->title = $request->title;
                $post->category_id = $request->category_id;
                $post->description = $request->description;
                $post->image = $image_url;
                $post->user_id = 1;
                $post->save();
            }

            return response()->json([
                'success' => 'updated successfully.'
            ]);
        } else {
            // $post = Post::where('id',$id)->firstOrfail();
            $post->title = $request->title;
            $post->category_id = $request->category_id;
            $post->description = $request->description;
            $post->user_id = 1;
            $post->image = $request->image;
            $post->save();
            return response()->json([
                'success' => 'updated successfully.'
            ]);
        }


    }

    public function destroy($id)
    {
        $post = Post::findOrfail($id);

        $image = $post->image;
        // dd($image);
        if (file_exists($image)) {
            unlink($image);
        }
        $post->delete();
        return "success";
    }

    public function searchPost(){
        $item = $_GET['s'];
        $posts = Post::with('category', 'user')->where('title','LIKE',"%$item%")
        ->orWhere('description','LIKE',"%$item%")->get();
        return $posts;
    }
}
