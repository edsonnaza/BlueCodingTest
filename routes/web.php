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

Auth::routes();

Route::put('counter/{id}', [App\Http\Controllers\LinksController::class, 'update'])->name('counter');
Route::get('/home', [App\Http\Controllers\LinksController::class, 'index'])->name('home');
Route::get('edit/{id}/edit', [App\Http\Controllers\LinksController::class,'edit'])->name('edit') ;

