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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/check_ID','thirdController@check')->middleware(['check_token']) ;
Route::get('/homework_check_id','homework_controller@homework_check')->middleware(['homework_check_token']);
Route::delete('products/{ProductID}','deleteController@deletProductById')->middleware(['tony_middlewar']);


Route::post('products','tonyController@createProduct');
Route::put('products/{nameId}','tonyController@updateNameByID');
// Route::delete('products/{ProductID}','tonyController@deletProductById');
//Route::get('products','ProductController@listAllProducts');


// Route::post('my_products','my_Controller@createProduct');
// Route::put('my_products/{nameId}','my_Controller@updateNameByID');
// Route::delete('my_products/{ProductID}','my_Controller@deletProductById');





//Route::post('new','newController@createProduct');
//Route::delete('new/{productID}','newController@deleteProductByID');

