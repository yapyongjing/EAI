<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EaiListController;
use App\Http\Controllers\FormController;

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

Route::resource('list',EaiListController::class);

Route::resource('form',FormController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create_ou', [App\Http\Controllers\HomeController::class, 'create'])->name('create_ou');
