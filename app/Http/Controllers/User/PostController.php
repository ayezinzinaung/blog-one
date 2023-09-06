<?php

namespace App\Http\Controllers\User;

use App\Models\User\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(Post $post)
    {
        return view('user.post', compact('post'));
    }

    public function getAllPosts()
    {
        return $posts = Post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(5);
    }

    public function saveLike(request $request)
    {
        $like = new like;
        $like->user_id = Auth::id();
        $like->post_id = $request->id;
        $like->save();
    }
}
