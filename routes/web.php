<?php

use App\Http\Controllers\DashboardController;
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



Route::get('/admin/login', [DashboardController::class, 'adminlogin'])->name('login');
Route::post('/admin/do-login', [DashboardController::class, 'dologin'])->name('dologin');
Route::group(['middleware'=>'auth'],function(){

    Route::get('/admin', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
   

    //for post
    Route::resource('post', PostController::class);

});