<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function webhome(){

        $posts=Post::where('is_publish','=','publish')->get();
        return view('frontend.partials.webhome',compact('posts'));
    }

    
}
