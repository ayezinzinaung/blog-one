@extends('user.app')
@section('bg-img', Storage::disk('local')->url($post->image))
@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/prism.css') }}">
@endsection
@section('title', $post->title)
@section('sub-heading', $post->subtitle)
@section('main-content')
<!-- Post Content-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/my_MM/sdk.js#xfbml=1&version=v16.0&appId=801164397699217&autoLogAppEvents=1" nonce="w42NmHWm"></script>
<article class="mb-4">
    <div class="container">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <small>Created at {{ $post->created_at->diffForHumans() }} </small>
                @foreach ($post->categories as $category)
                <small style="float: right;margin-right: 20px;">
                    <a href="{{ route('category', $category) }}">{{ $category->name }}</a>
                </small>
                @endforeach
                {!! htmlspecialchars_decode($post->body) !!}

                <h3>Tag Clouds</h3>
                @foreach ($post->tags as $tag)
                <a href="{{ route('tag', $tag) }}">
                    <small style="float: left;margin-right: 20px; border-radius: 5px; border:1px solid gray;
                        padding:5px;">
                        {{ $tag->name }}
                    </small>
                </a>
                @endforeach
            </div>

            <div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="10"></div>
        </div>
    </div>
</article>
@endsection
@section('footer')
    <script src="{{ asset('user/js/prism.js') }}"></script>
@endsection