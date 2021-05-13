@extends('layouts.app')


@section('content')

<div class="container">
    <h1 class="text-center">Create Post</h1>


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
        <form action="/blog" method="POST" enctype="multipart/form-data">
        @csrf
            <input type="text" name="title" placeholder="Title..." class="form-control mb-5">

            <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
            
            <div>
                <label class="form-label">
                    <span>Select a file</span>
                </label>
                <input type="file" name="image" class="form-control mb-4">
            </div>


            <button type="submit" class="btn bg-dark text-white">Create</button>

        </form>
    </div>
    

</div>
@endsection