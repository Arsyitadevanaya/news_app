<?php

use App\Http\Controllers\Api\ComentController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route User
Route::get('users',[UserController::class,'index']);
Route::get('users/{id}',[UserController::class,'show']);

//Route Post
Route::get('posts',[PostController::class,'index']);
Route::get('posts/{id}',[PostController::class,'show']);
Route::post('posts',[PostController::class,'store']);
Route::put('posts/{id}',[PostController::class,'update']);
Route::delete('posts/{id}',[PostController::class,'destroy']);




//Route Coment
Route::get('coments',[ComentController::class,'index']);
Route::get('coments/{id}',[ComentController::class,'show']);
Route::post('coments',[ComentController::class,'store']);
Route::put('coments/{id}',[ComentController::class,'update']);
Route::delete('coments/{id}',[ComentController::class,'destroy']);




