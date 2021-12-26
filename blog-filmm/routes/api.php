<?php

use Illuminate\Http\Request;
use App\Http\Controllers\FilmTestController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\TipFilmaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\AuthController;
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

//Route::get('/films/{id}',[FilmTestController::class,'show']);
//Route::get('/films',[FilmTestController::class,'index']);

Route::resource('films',FilmController::class);

Route::get('/users',[UserController::class,'index']);
Route::get('/users/{id}',[UserController::class,'show']);


Route::get('/tipfilmas',[TipFilmaController::class,'index']);
Route::get('/tipfilmas/{id}',[TipFilmaController::class,'show']);


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::delete('/films/{id}',[FilmController::class,'destroy']);
//Route::resource('tipfilmas',TipFilmaController::class);

