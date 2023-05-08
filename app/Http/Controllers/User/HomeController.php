<?php

namespace App\Http\Controllers\User;

use App\Models\User\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   public function index()
   {
      $posts = Post::where('status', 1)->paginate(5);
      return view('user.blog', compact('posts'));
   } 
}
