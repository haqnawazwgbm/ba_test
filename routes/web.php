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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/companies', [App\Http\Controllers\CompaniesController::class, 'index'])->name('companies');
Route::get('/create-company', [App\Http\Controllers\CompaniesController::class, 'create'])->name('create-company');
Route::post('/store-company', [App\Http\Controllers\CompaniesController::class, 'store'])->name('store-company');
Route::get('/edit-company/{id}', [App\Http\Controllers\CompaniesController::class, 'edit']);
Route::post('/update-company', [App\Http\Controllers\CompaniesController::class, 'update'])->name('update-company');
Route::get('/delete-company/{id}', [App\Http\Controllers\CompaniesController::class, 'destroy'])->name('delete-company');

Route::get('/employees', [App\Http\Controllers\EmployeesController::class, 'index'])->name('employees');
Route::get('/create-employee', [App\Http\Controllers\EmployeesController::class, 'create'])->name('create-employee');
Route::post('/store-employee', [App\Http\Controllers\EmployeesController::class, 'store'])->name('store-employee');
Route::get('/edit-employee/{id}', [App\Http\Controllers\EmployeesController::class, 'edit']);
Route::post('/update-employee', [App\Http\Controllers\EmployeesController::class, 'update'])->name('update-employee');
Route::get('/delete-employee/{id}', [App\Http\Controllers\EmployeesController::class, 'destroy'])->name('delete-employee');

