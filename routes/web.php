<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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



Route::get('/', [WebsiteController::class, 'webhome'])->name('webhome');
Route::get('/show/post/{id}', [WebsiteController::class, 'showpost'])->name('singlepost.show');
Route::get('/latest/post', [WebsiteController::class, 'latestpost'])->name('latest.post');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/user/register', [WebsiteController::class, 'register'])->name('register');
Route::post('/reg/store', [WebsiteController::class, 'registore'])->name('regi.store');
Route::get('/web/login', [WebsiteController::class, 'weblogin'])->name('weblogin');
Route::post('/do/web/login', [WebsiteController::class, 'doweblogin'])->name('doweblogin');



Route::get('/admin/login', [DashboardController::class, 'adminlogin'])->name('login');
Route::post('/admin/do-login', [DashboardController::class, 'dologin'])->name('dologin');
Route::group(['middleware'=>'auth'],function(){

    Route::get('/admin', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
    
    //for category
    Route::get('/category-list', [CategoryController::class, 'list'])->name('category.list');
   
  //for post
  Route::resource('post', PostController::class);

});