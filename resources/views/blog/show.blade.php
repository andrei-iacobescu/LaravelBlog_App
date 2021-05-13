@extends('layouts.app')


@section('content')

<div class="container">
    <h1 class="text-center">{{$post->title}}</h1>


    <div class="blog">
            <div class="blog-header">
                {{$post->title}}
            </div>
            <div class="blog-author">
                by <span>{{$post->user->name}}</span>
                <p>Created on {{date('jS M Y', strtotime($post->updated_at))}}</p>
            </div>
            <div class="blog-image my-3">
                <img class="img-fluid" src="{{ asset('images/' . $post->image_path) }}" alt="">
            </div>
            <div class="blog-content">
                {!! $post->description !!}
            </div>
            
    </div>


</div>
@endsection