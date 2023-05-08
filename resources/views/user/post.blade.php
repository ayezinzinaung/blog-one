@extends('user.app')
@section('bg-img', asset('user/img/post-bg.jpg'))
@section('title', $post->title)
@section('sub-heading', $post->subtitle)
@section('main-content')
<!-- Post Content-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/my_MM/sdk.js#xfbml=1&version=v16.0" nonce="w9DJPsOo"></script>
<article class="mb-4">
    <div class="container">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <small>Created at {{ $post->created_at->diffForHumans() }} </small>
                @foreach ($post->categories as $category)
                <small class="pull-right" style="margin-right: 20px">
                    {{ $category->name }}
                </small>
                @endforeach
                {!! htmlspecialchars_decode($post->body) !!}

                <h3>Tag Clouds</h3>
                @foreach ($post->tags as $tag)
                <small style="margin-right: 20px; border-radius: 5px; border:1px solid gray;
                    padding:5px;">
                    {{ $tag->name }}
                </small>
                @endforeach
            </div>

            <div class="fb-comments" data-href="https://localhost:8000" data-width="" data-numposts="10"></div>
        </div>
    </div>
</article>
@endsection