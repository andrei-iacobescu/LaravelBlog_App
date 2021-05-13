<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PagesController extends Controller
{
    //

        

    // public function index() {

        

    //     return view('index')
    //         ->with('posts', Post::latest()->first()->get());
    // }



    public function index() {

        $latest = Post::latest()->first();
        $recent = Post::take(3)->orderBy('created_at', 'desc')->get();
        return view('index')
            ->with('latest', $latest)
            ->with('recent', $recent);

        

        
            
    }




}
