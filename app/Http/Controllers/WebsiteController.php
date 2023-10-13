<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function webhome(){

        $posts=Post::where('is_publish','=','publish')->paginate(1);
        return view('frontend.partials.webhome',compact('posts'));
    }

    public function showpost($id){

        $post=Post::find($id);
        return view('frontend.pages.singlepost',compact('post'));
    }

    
}
