<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::with('gallery','category')->paginate('20');
        return view('backend.pages.post.list',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::all();
       

        return view('backend.pages.post.form',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=Validator::make($request->all(),[

                'category'=>'required',
                'gallery'=>'required',
                'title'=>'required',
                'description'=>'required',
                'is_publish'=>'required',
                'posted_by'=>'required',

        ]);

        if($validate->fails()){
            return redirect()->back();
        }

        $fileName='';
        if($request->hasFile('gallery'))
        {
            $fileName=date('Ymdhis').'.'.$request->file('gallery')->getClientOriginalExtension();
            $request->file('gallery')->storeAs('/uploads',$fileName);

            $gallery=Gallery::create([

                'image'=>$fileName
            ]);
        }

        Post::create([

            'category_id'=>$request->category,
            'gallery_id'=>$gallery->id,
            'title'=>$request->title,
            'description'=>$request->description,
            'is_publish'=>$request->is_publish,
            'posted_by'=>$request->posted_by
        ]);

      
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
