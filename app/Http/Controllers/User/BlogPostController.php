<?php

namespace App\Http\Controllers\User;

use App\Model\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogPostController extends Controller
{
    public function index(){
        $posts = Post::with('category','user')->orderBy('id','desc')->get();
        return response()->json([
            'blogposts' => $posts
        ],200);
    }

    public function post($id){
        $post = Post::with('user','category')->where('id',$id)->firstOrfail();
        return $post;
    }
}
