<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Gallery;
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
        $comment=Comment::where('post_id',$post->id)->get();
        return view('frontend.pages.post.singlepost',compact('post','comment'));
    
        
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
                'user_image'=>'required',
                'profession'=>'required',
                'institute'=>'required',
                'country'=>'required',
                'password'=>'required',
               
            
               
              

        ]);

        if($validate->fails()){
            return redirect()->route('webhome');
        }

        $fileName='';
        if($request->hasFile('user_image'))
        {
            $fileName=date('Ymdhis').'.'.$request->file('user_image')->getClientOriginalExtension();
            $request->file('user_image')->storeAs('/uploads',$fileName);

         
        }

        User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'profession'=>$request->profession,
            
            'institute'=>$request->institute,
            'country'=>$request->country,
            'password'=>bcrypt($request->password),
            'image'=>$fileName,
           

           
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

        $credentials=$request->only('email','password');
        if(auth()->attempt($credentials)){
            return redirect()->route('webhome');
        }

        return redirect()->back();

    }

    public function weblogout(){
        auth()->logout();
        return redirect()->route('webhome');
    }
    
    public function createpost(){
        $categories=Category::all();
        return view('frontend.pages.post.createpost',compact('categories'));
    }

    public function poststore(Request $request)
    {
        $validate=Validator::make($request->all(),[

                'category'=>'required',
                'category'=>'required',
                'gallery'=>'required',
                'title'=>'required',
                'description'=>'required',
                'name'=>'required',
                'profession'=>'required',
                'institute'=>'required',

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
            'institute'=>$request->institute
        ]);

      
        return redirect()->route('webhome');
    }


    public function userprofile(){

        $posts=Post::where('user_id',auth()->user()->id)->where('is_publish','publish')->get();

        $user=User::where('id',auth()->user()->id)->get();

        return view('frontend.pages.profile.userprofile',compact('user','posts'));
    }

  

    

    
    
}
