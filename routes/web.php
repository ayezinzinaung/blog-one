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

// User 
Route::group(['namespace' => 'User'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('/post', 'PostController@index')->name('post');
});

// Admin
Route::group(['namespace' => 'Admin'], function() {
    
    Route::get('/admin/home', 'HomeController@index');
    Route::resource('/admin/user', 'UserController');
    Route::resource('/admin/post', 'PostController');
    Route::resource('/admin/tag', 'TagController');
    Route::resource('/admin/category', 'CategoryController');
});



