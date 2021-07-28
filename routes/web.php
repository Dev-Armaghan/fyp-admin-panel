<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;

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
Route::get('/', function () {
    return view('index');
});
Route::get('addProducts',function(){
    return view('addProduct');
});
Route::get('editProducts',[ProductController::class,'show']);
Route::get('checkInventory',function(){
    return view('checkInventory');
});
Route::get('orders',function(){
    return view('orders');
});
Route::get('totalOrders',[SaleController::class,'todayOrders']);
Route::get('orders',[SaleController::class,'newOrders']);
Route::get('viewUsers',[UserController::class,'viewUsers']);

Route::post('insertProduct',[ProductController::class,'store'])->name('insert.product');
Route::get('deleteProduct/{id}',[ProductController::class,'destroy']);
Route::get('editProduct/{id}',[ProductController::class,'edit']);
Route::post('updateProduct/{id}',[ProductController::class,'update'])->name('update.product');
Route::get('currentStock',[ProductController::class,'currentStock']);
Route::get('search',[ProductController::class,'search']);
Route::get('searchUser',[UserController::class,'search']);