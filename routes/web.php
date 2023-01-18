<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EaiListController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\OprUnitController;
use App\Http\Controllers\AspectImpactController;
use App\Http\Controllers\MainWorkController;

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

Route::get('/formpage2', function () {
    return view('formpage2');
});

Route::resource('opr',OprUnitController::class);//operating unit

Route::resource('location',MainWorkController::class);//main work/location

Route::resource('list',EaiListController::class);//work

Route::resource('aspect_impact',AspectImpactController::class);//aspect impact

Route::resource('form',FormController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
