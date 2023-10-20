<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function comment(Request $request,$postId){

        // if(auth()->check()){

        //     $post=Post::find($postId);

        //     if(! $post){

        //         return back()->withErrors('unable to find the post');
        //     }

        //     return 'done';
        // }

        Comment::create([

            'post_id'=>$postId,
            'user_id'=>auth()->id(),
            'comment'=>$request->comment

        ]);

           return 'comment added successfully it will be visible after admin approve';

        }
    
    }



            
