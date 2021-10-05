<?php

use App\Http\Controllers\FlowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostEmployeeController;
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

Route::post('/state',[FlowController::class, 'updateStates']);

Route::post('/employee',[PostEmployeeController::class, 'store']);
Route::delete('/employee/{id}',[PostEmployeeController::class, 'destroy']);

