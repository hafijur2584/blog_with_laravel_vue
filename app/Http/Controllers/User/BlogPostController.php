<?php

namespace App\Http\Controllers\User;

use App\Model\Category;
use App\Model\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogPostController extends Controller
{
    public function index(){
        $posts = Post::with('category','user')->orderBy('id','desc')->paginate(4);
        return response()->json([
            'blogposts' => $posts
        ],200);
    }

    public function post($id){
        $post = Post::with('user','category')->where('id',$id)->firstOrfail();
        return $post;
    }
    public function category(){
        $categories = Category::with('posts')->get();
        return $categories;
    }
    public function postByCatId($id){
        $posts = Post::with('user','category')->where('category_id',$id)->orderBy('id','desc')->paginate(4);
        return $posts;
    }
    public function searchPost(){
        $item = \Request::get('s');
        $posts = Post::with('user','category')->where('title','LIKE',"%$item%")->orWhere('description','LIKE',"%$item%")->orderBy('id','desc')->paginate(4);
        return $posts;
    }
}
