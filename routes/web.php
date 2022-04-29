<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FlowController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ListdataController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\ProductcarController;
use App\Http\Controllers\ProductmasterController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\HistoryStatusController;
use App\Http\Controllers\UpdateOrderStatusController;
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

Route::group(['middleware' => 'auth'], function(){

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('admin/home',[HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/employee',[EmployeeController::class, 'index']);

Route::get('/request',[EmployeeController::class, 'index']);
Route::get('/request',[RequestController::class, 'index']);

Route::get('/form/{id}',[FormController::class, 'detail']);

Route::get('/workinprogress',[ListdataController::class, 'workinprogress']);

Route::get('/vehicle',[VehicleController::class, 'index']);

Route::get('/customer',[CustomerController::class, 'index']);

Route::get('/order',[OrderController::class, 'index']);

Route::get('/expenses',[ExpensesController::class, 'addexpenses']);
Route::get('/updatestatus',[UpdateOrderStatusController::class, 'updatestatus']);
Route::get('/updatestatusdetail',[UpdateOrderStatusController::class, 'updatestatusdetail']);
Route::get('/historyproduct',[HistoryStatusController::class, 'producthistory']);
Route::get('/historycar',[HistoryStatusController::class, 'carhistory']);

Route::get('/productcar',[ProductcarController::class, 'index']);
Route::get('/productmaster',[ProductmasterController::class, 'index']);
Route::get('/permission',[PermissionController::class, 'index']);

Route::get('/manage',[ManageController::class, 'index']);
Route::get('/managecar',[ManageController::class, 'car']);
Route::get('/manageemployeecar',[ManageController::class, 'employeecar']);
Route::get('/headupdate',[ManageController::class, 'headupdate']);

});

Route::get('/tracking',[TrackingController::class, 'index']);


