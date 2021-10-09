<?php

use App\Http\Controllers\FlowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCustomerController;
use App\Http\Controllers\PostEmployeeController;
use App\Http\Controllers\PostRequestController;
use App\Http\Controllers\PostVehicleController;
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

Route::get('/posts',[PostController::class, 'index']);
Route::post('/post',[PostController::class, 'store']);
Route::get('/posts/{id}',[PostController::class, 'show']);
Route::put('/posts/{id}',[PostController::class, 'update']);
Route::delete('/posts/{id}',[PostController::class, 'destroy']);

Route::get('/flows',[FlowController::class, 'index']);
Route::post('/flow',[FlowController::class, 'store']);

Route::get('/request/{id}',[PostRequestController::class, 'show']);
Route::post('/request',[PostRequestController::class, 'store']);

Route::post('/state',[FlowController::class, 'updateStates']);

Route::post('/employee',[PostEmployeeController::class, 'store']);
Route::delete('/employee/{id}',[PostEmployeeController::class, 'destroy']);
Route::get('/employee/{id}',[PostEmployeeController::class, 'show']);
Route::PUT('/employee/{id}',[PostEmployeeController::class, 'update']);

Route::post('/vehicle',[PostVehicleController::class, 'store']);
Route::delete('/vehicle/{id}',[PostVehicleController::class, 'destroy']);
Route::get('/vehicle/{id}',[PostVehicleController::class, 'show']);
Route::PUT('/vehicle/{id}',[PostVehicleController::class, 'update']);

Route::post('/customer',[PostCustomerController::class, 'store']);
Route::delete('/customer/{id}',[PostCustomerController::class, 'destroy']);
Route::get('/customer/{id}',[PostCustomerController::class, 'show']);
Route::PUT('/customer/{id}',[PostCustomerController::class, 'update']);
