<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

        Category::create([

            "name"=>$request->name
        ]);

        return redirect()->route('category.list');
    }
}


