<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OprUnitController;
use App\Http\Controllers\MainWorkController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\AspectImpactController;
use App\Http\Controllers\OprFormController;
use App\Http\Controllers\WorkFormController;
use App\Http\Controllers\AspectImpactFormController;
use App\Http\Controllers\ImportanceRatingController;

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


//operating unit
// Route::resource('opr',OprUnitController::class);
Route::controller(OprUnitController::class)->group(function() {
    Route::get('/opr', 'index')->name('opr.index');
    Route::get('/opr-create', 'create')->name('opr.create');
    Route::post('/opr-store', 'store')->name('opr.store');
    Route::get('/opr/{opr}', 'edit')->name('opr.edit');
    Route::put('/opr/{opr}', 'update')->name('opr.update');
    Route::delete('/opr/{opr}/destroy', 'destroy')->name('opr.destroy');
});

//main work/location
Route::resource('location',MainWorkController::class);

//work
// Route::resource('list',WorkController::class);
Route::controller(WorkController::class)->group(function() {
    Route::get('/list', 'index')->name('list.index');
    Route::get('/list-create', 'create')->name('list.create');
    Route::post('/list-store', 'store')->name('list.store');
    Route::get('/list/{list}', 'edit')->name('list.edit');
    Route::put('/list/{list}', 'update')->name('list.update');
    Route::delete('/list/{list}/destroy', 'destroy')->name('list.destroy');
});

//aspect impact
Route::resource('aspect_impact',AspectImpactController::class);

//form controller
// Route::resource('form',OprFormController::class);//operating unit form
Route::controller(OprFormController::class)->group(function() {
    Route::get('/opr-forms', 'index')->name('oprForm.index');
    Route::get('/opr-form-create', 'create')->name('oprForm.create');
    Route::post('/opr-form-store', 'store')->name('oprForm.store');
    Route::get('/opr-forms/{id}', 'edit')->name('oprForm.edit');
    Route::put('/opr-forms/{id}', 'update')->name('oprForm.update');
    Route::delete('/opr-forms/{id}/destroy', 'destroy')->name('oprForm.destroy');
});

//work activity form
// Route::resource('form.works',WorkFormController::class); 
Route::controller(WorkFormController::class)->group(function() {
    Route::get('/opr-forms/{id}/works', 'index')->name('oprForm.work.index');
    Route::get('/opr-forms/{id}/work-create', 'create')->name('oprForm.work.create');
    Route::post('/opr-forms/{id}/work-store', 'store')->name('oprForm.work.store');
    Route::get('/opr-forms/{id}/works/{work_id}', 'edit')->name('oprForm.work.edit');
    Route::put('/opr-forms/{id}/works/{work_id}', 'update')->name('oprForm.work.update');
    Route::delete('/opr-forms/{id}/works/{work_id}/destroy', 'destroy')->name('oprForm.work.destroy');
});

//aspect impact form
Route::controller(AspectImpactFormController::class)->group(function() {
    Route::get('/opr-forms/{id}/works/{work_id}/aspect-impacts', 'index')->name('oprForm.work.aspectImpact.index');
    Route::get('/opr-forms/{id}/works/{work_id}/aspect-impacts-create', 'create')->name('oprForm.work.aspectImpact.create');
    Route::post('/opr-forms/{id}/works/{work_id}/aspect-impacts-store', 'store')->name('oprForm.work.aspectImpact.store');
    Route::get('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}', 'edit')->name('oprForm.work.aspectImpact.edit');
    Route::put('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}', 'update')->name('oprForm.work.aspectImpact.update');
    Route::delete('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/destroy', 'destroy')->name('oprForm.work.aspectImpact.destroy');
});

Route::controller(ImportanceRatingController::class)->group(function() {
    Route::get('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/importance-rating', 'index')->name('oprForm.work.aspectImpact.importantRating.index');
    Route::get('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/importance-rating-create', 'create')->name('oprForm.work.aspectImpact.importantRating.create');
    Route::post('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/importance-rating-store', 'store')->name('oprForm.work.aspectImpact.importantRating.store');
    Route::get('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/importance-rating-edit', 'edit')->name('oprForm.work.aspectImpact.importantRating.edit');
    Route::put('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/importance-rating-update', 'update')->name('oprForm.work.aspectImpact.importantRating.update');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
