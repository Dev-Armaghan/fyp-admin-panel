<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('registerUser','AuthController@register');
Route::post('loginUser','AuthController@login');
Route::post('search','AuthController@search');
Route::post('forgot','AuthController@forgot');
Route::post('checkToken','AuthController@checkToken');
Route::post('reset','AuthController@reset');
Route::post('takeAddress','AuthController@takeAddress');
Route::post('addToCart','AuthController@addToCart');