<?php

use Illuminate\Support\Facades\Route;

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

//This will catch GET request to routes/web but  PUT,DELETE, OPTIONS etc. fails
Route::fallback(function () {
    abort(403, 'Unauthorized action.');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function () {
	Route::resource('companies', App\Http\Controllers\Admin\CompanyController::class)->middleware('check-permission:admin');;
	Route::resource('employees', App\Http\Controllers\Admin\EmployeeController::class)->middleware('check-permission:admin');;
});
