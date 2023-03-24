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
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    
    Route::get('/home', 'HomeController@index');
    Route::resource('/user', 'UserController');
    Route::resource('/post', 'PostController');
    Route::resource('/tag', 'TagController');
    Route::resource('/category', 'CategoryController');
});



