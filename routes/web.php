<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['middleware'=>'language'],function(){
Route::get('/', [WebsiteController::class, 'webhome'])->name('webhome');
Route::get('/show/post/{id}', [WebsiteController::class, 'showpost'])->name('singlepost.show');
Route::get('/latest/post', [WebsiteController::class, 'latestpost'])->name('latest.post');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/user/register', [WebsiteController::class, 'register'])->name('register');
Route::post('/reg/store', [WebsiteController::class, 'registore'])->name('regi.store');
Route::get('/web/login', [WebsiteController::class, 'weblogin'])->name('weblogin');
Route::post('/do/web/login', [WebsiteController::class, 'doweblogin'])->name('doweblogin');
Route::get('/web/logout', [WebsiteController::class, 'weblogout'])->name('web.logout');
Route::get('/category', [WebsiteController::class, 'weblogout'])->name('web.logout');

Route::get('/create/post', [WebsiteController::class, 'createpost'])->name('create.post');
Route::post('/createpost/store', [WebsiteController::class, 'poststore'])->name('createpost.store');
Route::get('/user/profile', [WebsiteController::class, 'userprofile'])->name('user.profile');
Route::get('/change/{lang}',[WebsiteController::class,'changelang'])->name('change.lang');


//for comment
Route::post('/comment/{postId}',[CommentController::class,'comment'])->name('comment');
});

Route::get('/admin/login', [DashboardController::class, 'adminlogin'])->name('login');
Route::post('/admin/do-login', [DashboardController::class, 'dologin'])->name('dologin');
Route::group(['middleware'=>'auth'],function(){

    Route::get('/admin', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
    
    //for category
    Route::get('/category-list', [CategoryController::class, 'list'])->name('category.list');
   
  //for post
  Route::resource('post', PostController::class);

  Route::get('/post/accept/{id}',[PostController::class,'postaccept'])->name('post.accept');
  Route::get('/post/reject/{id}',[PostController::class,'postreject'])->name('post.reject');

  Route::resource('view',ViewController::class);
});