@extends('layouts.web_app')

@section('title')
    main page
    @endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                @foreach($posts as $post)

                    <div class="post-preview">
                        <a href="{{route('index.post.web',[$post->id])}}">
                            <h2 class="post-title">
                               {{ $post->title}}
                            </h2>

                        </a>
                        <p class="post-meta">Posted by {{$post->user->name}}
                            on {{$post->created_at}}</p>
                    </div>
                    <hr>

                    @endforeach

            </div>
        </div>
    </div>


@endsection



@section('subject')
    welcome
    @endsection

@section('headerimage')
    {{url('/images/home.jpg')}}
    @endsection


