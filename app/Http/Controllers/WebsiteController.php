<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function webhome(){
      
        $categories=Category::all();
        $posts=Post::where('is_publish','=','publish')->paginate(1);
        return view('frontend.partials.webhome',compact('posts','categories'));
    }

    public function showpost($id){

        $post=Post::find($id);
        return view('frontend.pages.singlepost',compact('post'));
    }
    
    public function latestpost(){
        $latestpost=Post::where('is_publish','=','publish')->orderby('id','desc')->take(2)->get();
        return view('frontend.pages.post.latest',compact('latestpost'));
    }
    
}
