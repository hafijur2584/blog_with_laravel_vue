<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::paginate(2);
        // return response()->json([
        //     'categories' => $categories
        // ],200);
        
        return new CategoryResource(Category::paginate(2));
    }

    

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return ['ok',200];


    }
    public function edit($id){
        $category = Category::where('id',$id)->firstOrfail();
        return response()->json([
            'category' => $category
        ],200);
    }

    
    public function show($id)
    {
        //
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);
        $category = Category::where('id',$id)->firstOrfail();
        $category->name = $request->name;
        $category->update();
        return response()->json([
            'success' => "success"
        ],200); 
    }

    
    public function destroy($id)
    {
        $category = Category::where('id',$id)->firstOrfail();
        // dd($category);
        $category->delete();

        return response()->json([
            'delete successfully.'
        ],200);    }
    }
