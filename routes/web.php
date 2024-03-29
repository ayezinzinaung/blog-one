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
    Route::get('/post/tag/{tag}', 'HomeController@tag')->name('tag');
    Route::get('/post/category/{category}', 'HomeController@category')->name('category');
    Route::get('/post/{post}', 'PostController@post')->name('post');

    // Vue routes
    Route::post('getPosts', 'PostController@getAllPosts');
    Route::post('saveLike', 'PostController@saveLike');
});

// Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {

    Route::get('/admin-login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/admin-login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/home', 'HomeController@index')->name('admin.home');
    Route::resource('/user', 'UserController');
    Route::resource('/post', 'PostController');
    Route::resource('/role', 'RoleController');
    Route::resource('/permission', 'PermissionController');
    Route::resource('/tag', 'TagController');
    Route::resource('/category', 'CategoryController');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
