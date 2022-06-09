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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});



Route::put('counter/{id}', [App\Http\Controllers\LinksController::class, 'update'])->name('counter')->middleware('auth');;
Route::get('/home', [App\Http\Controllers\LinksController::class, 'index'])->name('home')->middleware('auth');;
Route::get('edit/{id}/edit', [App\Http\Controllers\LinksController::class,'edit'])->name('edit')->middleware('auth'); ;
//Route::get('visitor', [App\Http\Controllers\LinksController::class, 'show'])->name('visitor');
Route::post('urls/create', [App\Http\Controllers\LinksController::class, 'create'])->name('urls.create')->middleware('auth');;
Route::get('urls/{id}/show', [App\Http\Controllers\LinksController::class, 'show'])->name('urls.show')->middleware('auth');;
