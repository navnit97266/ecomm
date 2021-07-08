<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('/login', function () {
     return view('login');
 });

Route::post('/login',[UserController::class,'login']);

Route::get('/',[ProductController::class,'index']);
Route::get('/logout', function () {
    if(session()->has('user')){
        session()->pull('user');
        }
    return view('login');
});

Route::view('home','home');

route::get('home',function () {
    if(session()->has('user')){
        return view('home');
        
    }
    return view('login');
});

Route::get('detail/{id}',[ProductController::class,'detail']);
Route::get('/search',[ProductController::class,'search']);
Route::post('addtocart',[ProductController::class,'addtocart']);