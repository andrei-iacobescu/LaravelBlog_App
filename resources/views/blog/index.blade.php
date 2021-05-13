@extends('layouts.app')


@section('content')

<div class="container">
    <h1 class="text-center">Blog Posts</h1>

    @if (session()->has('message'))
        <div class="m-auto">
            <p>
                {{session()->get('message')}}
            </p>
        </div>
    @endif


    @if (Auth::check())
        <div class="pt-5 mb-5">
            <a href="/blog/create" class="create-post-btn btn bg-dark text-white uppercase">
                Create Post
            </a>
        </div>
    @endif


    @foreach ($posts as $post)
        
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
                    {!!Illuminate\Support\Str::limit($post->description, 750)!!}
                </div>
                <div class="blog-footer">
                    <button class="btn">
                        <a href="/blog/{{$post->slug}}">Keep Reading</a>
                    </button>

                    @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                        <div class="btn-wrapper float-right">
                            <button class="btn mr-2 edit-btn">
                                <a href="/blog/{{$post->slug}}/edit">Edit</a>
                            </button>
                            
                        

                        
                            <form action="/blog/{{$post->slug}}" method="POST">
                                @csrf 
                                @method('delete')

                                <button class="btn delete-btn bg-red text-white" type="submit">
                                    Delete
                                </button>
                            
                            </form>
                        </div>
                    @endif
                </div>
            </div>

    @endforeach

</div>

@endsection