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
                'name'=>'required',
                'profession'=>'required',
                'institute'=>'required',
                'is_publish'=>'required',

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

            'user_id'=>auth()->id(),
            'category_id'=>$request->category,
            'gallery_id'=>$gallery->id,
            'title'=>$request->title,
            'description'=>$request->description,
            'name'=>$request->name,
            'profession'=>$request->profession,
            'institute'=>$request->institute,
            'is_publish'=>$request->is_publish
        ]);

      
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $show=Post::find($id);
        return view('backend.pages.post.view',compact('show'));
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

    public function postaccept($id)
    {
        $post=Post::find($id);

        $post->is_publish='publish';
        $post->save();
        return redirect()->back()->with('message','post published');
    }
    public function postreject($id)
    {
        $post=Post::find($id);

        $post->is_publish='rejected';
        $post->save();
        return redirect()->back()->with('message','post rejected');
    }
}
