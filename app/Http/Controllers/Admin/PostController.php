<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::with('category','user')->get();
        
        return response()->json([
            'posts' => $posts
        ],200);   
    }

    

    public function store(Request $request)
    {
        return 'test';
    }

    public function show($id)
    {
        return "test";    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
