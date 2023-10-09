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
}
