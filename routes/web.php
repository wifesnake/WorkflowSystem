<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FlowController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ListdataController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('admin/home',[HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/employee',[EmployeeController::class, 'index']);
Route::get('/request',[EmployeeController::class, 'index']);

Route::get('/request',[RequestController::class, 'index']);

Route::get('/form/{id}',[FormController::class, 'detail']);

Route::get('/workinprogress',[ListdataController::class, 'workinprogress']);
