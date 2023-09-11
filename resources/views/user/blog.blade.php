@extends('user.app')
@section('bg-img', asset('user/img/home-bg.jpg'))
@section('title', 'Blog One')
@section('sub-heading', 'Learn Together & Grow Together')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .fa-thumbs-up:hover{
            color: blue;
        }
    </style>
@endsection
@section('main-content')
    <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center" id="app">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    {{--  Post preview  --}}
                    <posts
                    v-for='value in blog'
                    :title=value.title
                    :subtitle=value.subtitle
                    :created_at=value.created_at
                    :key=value.index
                    :post-id= value.id
                    login="{{ Auth::guard('web')->check()}}"
                    ></posts>

                    <div class="d-flex justify-content-end mb-4">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
@endsection
