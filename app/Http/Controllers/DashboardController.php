<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function dashboard(){

        $categories=Category::all()->count();
        $user=User::all()->count();
        $posts=Post::all()->count();
        $todaypost= Post::whereDate('created_at', Carbon::today())->get()->count();
        $draft=Post::where('is_publish','draft')->get()->count();
        $publish=Post::where('is_publish','publish')->get()->count();      
         return view('backend.partials.home',compact('categories','user','posts','todaypost','draft','publish'));
    }

    public function adminlogin(){
        return view('backend.partials.login');
    }

    public function dologin(Request $request){

        $validate= Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required|min:5'
        ]);

        if($validate->fails())
        {
        return redirect()->back()->with("message","Validation failed");
        }
    

    $credentials=$request->only(['email','password']);

    if(auth()->attempt($credentials)){
        return redirect()->route('dashboard')->withSuccess($validate->messages());
    }

    return redirect()->back()->with("message","Invalid Credentials");
}

public function logout(){
    auth()->logout();
    return redirect()->route('login')->withSuccess('Logged Out');
}
}
