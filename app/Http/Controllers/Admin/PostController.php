<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::all(); 
        dd($posts);
        return $posts;   
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
