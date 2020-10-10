<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.home');
});
Route::get('/', 'HomeController@userHome')->name('userHome');
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin/login', 'HomeController@login')->name('login');

//Route::resource('/api/post','Admin\PostController')->except('destroy');


//  Route::get('/{path}','HomeController@index')->where('path','.*');


