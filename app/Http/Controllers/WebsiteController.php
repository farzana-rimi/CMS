<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{
    public function webhome(){
      
        $categories=Category::all();
        $posts=Post::where('is_publish','=','publish')->paginate(5);
        return view('frontend.partials.webhome',compact('posts','categories'));
    }

    public function showpost($id){

        $post=Post::find($id);
        return view('frontend.pages.post.singlepost',compact('post'));
    }
    
    public function latestpost(){
        $latestpost=Post::where('is_publish','=','publish')->orderby('id','desc')->take(2)->get();
        return view('frontend.pages.post.latest',compact('latestpost'));
    }

    public function contact(){

        return view('frontend.pages.contact.contact');
    }
        

    public function about(){
        return view('frontend.pages.contact.about');
    }

    public function register(){
        return view('frontend.pages.auth.register');
    }

    public function registore(Request $request)
    {
        $validate=Validator::make($request->all(),[

                'name'=>'required',
                'email'=>'required',
                // 'user_image'=>'required',
                'password'=>'required',
                'profession'=>'required',
              

        ]);

        if($validate->fails()){
            return redirect()->route('webhome');
        }

        // $fileName='';
        // if($request->hasFile('user_image'))
        // {
        //     $fileName=date('Ymdhis').'.'.$request->file('user_image')->getClientOriginalExtension();
        //     $request->file('user_image')->storeAs('/uploads',$fileName);

         
        // }

        User::create([

            'name'=>$request->name,
            // 'image'=>$fileName,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'type'=>$request->profession,
           
        ]);

      
        return redirect()->route('webhome');
    }

    public function weblogin(){

        return view('frontend.pages.auth.login');
    }

    public function doweblogin(Request $request){

        $validate=Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required'
        ]);

        if($validate->fails()){
            return redirect()->back();

        }

        $credentials=$request->except('_token');
        if(auth()->attempt($credentials)){
            return redirect()->route('webhome');
        }

        return redirect()->back();

    }


    
    
}
