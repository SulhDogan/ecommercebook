<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderBookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ShopCartController;
use App\Models\ShopCart;
use Illuminate\Support\Facades\Route;

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

Route::get('/index',[BookController::class,'mainindex'])->name('index');

Route::get('/',[BookController::class,'mainindex']);
Route::get('/login',function(){
    return view('login');
});
Route::get('/register',function(){
    return view('registeruser');
});
Route::post('/registeruser',[UserController::class,'register']);
Route::post('/loginuser',[UserController::class,'login']);
Route::get('/logoutuser',[UserController::class,'logout']);
Route::resource('/edituser',UserController::class);
Route::get('/adminlogin',function(){
    return view('adminlogin');
});
Route::get('/panel',[AdminController::class,'panel']);
Route::post('/panellogin',[AdminController::class,'adminlogin']);
Route::get('/panellogout',[AdminController::class,'adminlogout']);
Route::resource('publisher',PublisherController::class);
Route::resource('author',AuthorController::class);
Route::resource('book',BookController::class);
Route::get('bookinfo/{id}',[BookController::class,'bookinfo']);

//shopcart
Route::post('store/{id}',[ShopCartController::class,'ekle'])->name('shopcard_add');
Route::get('/ushopcard/{id}',[ShopCartController::class,'index']);
Route::get('/ushopcart/{id}/delete',[ShopCartController::class,'destroy']);
Route::post('/update/{id}',[ShopCartController::class,'update'])->name('shopcard_edit');
Route::get('/buy/{id}',[ShopCartController::class,'gonder']);
///
Route::post('order/{id}',[OrderController::class,'olustur'])->name('order_add');
Route::get('/gecmis/{id}',[OrderController::class,'gecmis']);