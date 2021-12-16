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

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');

Auth::routes();



Route::middleware(['auth','checkrole'])->prefix('user')->group(function ()
{
    Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/add',[\App\Http\Controllers\HomeController::class,'add'])->name('add');
    Route::post('/store',[\App\Http\Controllers\HomeController::class,'store'])->name('store');
    Route::get('/import',[\App\Http\Controllers\HomeController::class,'import'])->name('import');
    Route::post('/saveimport',[\App\Http\Controllers\HomeController::class,'saveimport'])->name('saveimport');
});
