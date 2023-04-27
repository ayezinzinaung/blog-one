<?php

namespace App\Http\Controllers\User;

use App\Models\User\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function post(Post $post)
    {
        return view('user.post', compact('post'));
    }
}
