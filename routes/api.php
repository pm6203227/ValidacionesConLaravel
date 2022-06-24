<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::post("/servicio1", "App\Http\Controllers\HomeController1@rut1Request");
Route::post("/servicio2", "App\Http\Controllers\HomeController1@rut2Request");
Route::post("/servicio3", "App\Http\Controllers\HomeController1@rut3Request");
Route::post("/servicio4", "App\Http\Controllers\HomeController1@rut4Request");
Route::post("/servicio5", "App\Http\Controllers\HomeController1@rut5Request");
Route::get("/login", "App\Http\Controllers\Auth\LoginController@index");
