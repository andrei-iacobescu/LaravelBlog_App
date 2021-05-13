@extends('layouts.app')


@section('content')

<div class="container">
    <h1 class="text-center">Update Post</h1>


    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>


    @endif
    
    <div class="wrapper">
        <form action="/blog/{{$post->slug}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <input type="text" name="title" value="{{$post->title}}" placeholder="Title..." class="form-control mb-5">
            <textarea name="description" class="form-control" id="ck" col="40" rows="17">{{ $post->description }}</textarea>
            <button type="submit" class="btn bg-dark text-white">Update</button>
        </form>
    </div>
    

</div>
@endsection