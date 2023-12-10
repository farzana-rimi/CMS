<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(){

        $categories=Category::all();
        return view('backend.pages.category.list',compact('categories'));
    }

    public function create(){

        return view('backend.pages.category.create');
    }


    public function store(Request $request){


        $fileName='';
        if($request->hasFile('category_img'))
        {
            $fileName=date('Ymdhis').'.'.$request->file('category_img')->getClientOriginalExtension();
            $request->file('category_img')->storeAs('/uploads',$fileName);

           
        }
        Category::create([

            "name"=>$request->name,
            "image"=>$fileName,
            "title"=>$request->title,
            
        ]);

        return redirect()->route('category.list');
    }

    public function edit($id){


    }

    public function view($id){
        $category=Category::find($id);
        return view('backend.pages.category.view',compact('category'));
    }

    public function delete($id){



    }
}


