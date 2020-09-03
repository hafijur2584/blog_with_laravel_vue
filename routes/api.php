<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/category','Admin\CategoryController')->except('destroy');
Route::get('/category/destroy/{id}','Admin\CategoryController@destroy')->name('category.destroy');
Route::get('/category/edit/{id}','Admin\CategoryController@edit')->name('category.edit');

Route::apiResource('/post','Admin\PostController')->except('destroy');
Route::get('/post/destroy/{id}','Admin\PostController@destroy')->name('post.destroy');
Route::get('/post/edit/{id}','Admin\PostController@edit')->name('post.edit');