@extends('layouts.app')

@section('content')

   

{{-- @foreach ($latests as $latest) --}}
<div class="container">
    
    
        <div class="blog">
            <div class="blog-header">
                {{$latest->title}}
            </div>
            <div class="blog-author">
                by <span>{{$latest->user->name}}</span>
                <p>Created on {{date('jS M Y', strtotime($latest->updated_at))}}</p>
            </div>
            <div class="blog-image my-3">
                <img class="img-fluid" src="{{ asset('images/' . $latest->image_path) }}" alt="">
            </div>
            <div class="blog-content">
                {!!Illuminate\Support\Str::limit($latest->description, 450)!!}
            </div>
            <div class="blog-footer">
                <button class="btn">
                    <a href="/blog/{{$latest->slug}}">Keep Reading</a>
                </button>

                @if (isset(Auth::user()->id) && Auth::user()->id == $latest->user_id)
                {{-- <div class="buttons-wrap"> --}}
                    <div class="btn-wrapper float-right">
                        <button class="btn mr-2 edit-btn">
                            <a href="/blog/{{$latest->slug}}/edit">Edit</a>
                        </button>
                        
                    

                    
                        <form action="/blog/{{$latest->slug}}" method="POST">
                            @csrf 
                            @method('delete')

                            <button class="btn delete-btn float-right bg-red text-white" type="submit">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        
        </div>
    

        
        
            
        
            <div class="recent container">
                <h2>Recent Posts</h2>
                <div class="row">
                    @foreach ($recent as $recent)
                        
                    
                    <div class="col-sm-4 recent-post">
                        <div class="card">
                            <img src="{{ asset('images/' . $recent->image_path) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">{{$recent->title}}</h5>
                            <p class="card-text">{!!Illuminate\Support\Str::limit($recent->description, 250)!!}</p>
                            <a href="#" class="btn card-btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
                    
                </div>
                
            </div>
        </div>
</div>

@endsection()