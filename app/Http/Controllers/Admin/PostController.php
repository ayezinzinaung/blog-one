<?php

namespace App\Http\Controllers\Admin;

use App\Models\User\Tag;
use App\Models\User\Post;
use Illuminate\Http\Request;
use App\Models\User\Category;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $posts = Post::all();
        return view('admin.post.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,
       [
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required',
       ]);

       if ($request->hasFile('image')) {
            $imageName =$request->image->store('public');
        }

       $post = new Post;
       $post -> image = $imageName;
       $post ->title = $request ->title;
       $post ->subtitle = $request ->subtitle;
       $post ->slug = $request ->slug;
       $post ->body = $request ->body;
       $post ->status = $request ->status;
       $post->save();
       $post ->tags()->sync($request->tags);
       $post ->categories()->sync($request->categories);

       return redirect(route('admin.post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with('tags', 'categories')->where('id', $id)->first();
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
       [
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required',
       ]);

        if ($request->hasFile('image')) {
            $imageName =$request->image->store('public');
        }

       $post = Post::find($id);
       $post -> image = $imageName;
       $post ->title = $request ->title;
       $post ->subtitle = $request ->subtitle;
       $post ->slug = $request ->slug;
       $post ->body = $request ->body;
       $post ->status = $request ->status;
       $post->save();
       $post ->tags()->sync($request->tags);
       $post ->categories()->sync($request->categories);

       return redirect(route('admin.post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect()->back();
    }
}
