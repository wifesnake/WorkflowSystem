<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home',[HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/workinprogress', [App\Http\Controllers\WorkinprogressController::class, 'index'])->name('workinprogress');
Route::get('/complete', [App\Http\Controllers\CompleteController::class, 'index'])->name('complete');
Route::get('/cancel', [App\Http\Controllers\CancelController::class, 'index'])->name('cancel');


