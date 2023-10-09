<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function dashboard(){

        return view('backend.partials.home');
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
        return redirect()->back()->withErrors($validate->messages());
        }
    

    $credentials=$request->only(['email','password']);

    if(auth()->attempt($credentials)){
        return redirect()->route('dashboard')->withSuccess($validate->messages());
    }

    return redirect()->back()->withErrors($validate->message());
}

public function logout(){
    auth()->logout();
    return redirect()->route('login')->withSuccess('Logged Out');
}
}
