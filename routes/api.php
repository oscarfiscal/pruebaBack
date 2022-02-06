<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\VehicleController;


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


/* 
! endpoint para crear vehiculo.
     ! @oscar fiscal
     ! date:29/01/2022
    */
    Route::post('/register',[App\Http\Controllers\api\VehicleController::class,'store']);
    Route::get('/vehicle',[App\Http\Controllers\api\VehicleController::class,'index']);
    Route::get('/query',[App\Http\Controllers\api\VehicleController::class,'query']);
