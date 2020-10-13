<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::paginate(5);
        return response()->json($data);

        // return new CategoryResource(Category::paginate(2));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return ['ok', 200];


    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->firstOrfail();
        return response()->json([
            'category' => $category
        ], 200);
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
        $category = Category::where('id', $id)->firstOrfail();
        $category->name = $request->name;
        $category->update();
        return response()->json([
            'success' => "success"
        ], 200);
    }


    public function destroy($id)
    {
        $category = Category::where('id', $id)->firstOrfail();
        // dd($category);
        $category->delete();

        return response()->json([
            'delete successfully.'
        ], 200);
    }
    public function searchCategory(){
        $item = $_GET['s'];
        $categories = Category::where('name','LIKE',"%$item%")->get();
        return $categories;
    }
}
