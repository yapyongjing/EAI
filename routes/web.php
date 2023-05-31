<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\PersonInChargeController;
use App\Http\Controllers\OprUnitController;
use App\Http\Controllers\MainWorkController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\AspectImpactController;

use App\Http\Controllers\OprFormController;
use App\Http\Controllers\WorkFormController;
use App\Http\Controllers\AspectImpactFormController;
use App\Http\Controllers\ImportanceRatingController;
use App\Http\Controllers\RiskControlController;

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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(PersonInChargeController::class)->group(function() {
    Route::get('/person-in-charge', 'index')->name('pic.index');
    Route::get('/person-in-charge-create', 'create')->name('pic.create');
    Route::post('/person-in-charge-store', 'store')->name('pic.store');
    Route::get('/person-in-charge/{pic}', 'edit')->name('pic.edit');
    Route::put('/person-in-charge/{pic}', 'update')->name('pic.update');
    Route::delete('/person-in-charge/{pic}/destroy', 'destroy')->name('pic.destroy');
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

//form section
//operating unit form controller
// Route::resource('form',OprFormController::class);//operating unit form
Route::controller(OprFormController::class)->group(function() {
    Route::get('/opr-forms', 'index')->name('oprForm.index');
    Route::get('/opr-form-create', 'create')->name('oprForm.create');
    Route::post('/opr-form-store', 'store')->name('oprForm.store');
    Route::get('/opr-forms/{id}', 'edit')->name('oprForm.edit');
    Route::put('/opr-forms/{id}', 'update')->name('oprForm.update');
    Route::delete('/opr-forms/{id}/destroy', 'destroy')->name('oprForm.destroy');
    // Route::get('/opr-forms/{id}/print-pdf', 'printPdf')->name('oprForm.print-pdf');
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
    Route::get('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/print-pdf', 'printPdf')->name('oprForm.work.aspectImpact.print-pdf');

});

//rating aka "importance"
Route::controller(ImportanceRatingController::class)->group(function() {
    Route::get('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/importance-rating', 'index')->name('oprForm.work.aspectImpact.importantRate.index');
    Route::get('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/importance-rating-create', 'create')->name('oprForm.work.aspectImpact.importantRate.create');
    Route::post('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/importance-rating-store', 'store')->name('oprForm.work.aspectImpact.importantRate.store');
    Route::get('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/importance-rating/{rating_id}', 'edit')->name('oprForm.work.aspectImpact.importantRate.edit');
    Route::put('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/importance-rating/{rating_id}', 'update')->name('oprForm.work.aspectImpact.importantRate.update');
    Route::delete('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/importance-rating/{rating_id}/destroy', 'destroy')->name('oprForm.work.aspectImpact.importantRate.destroy');
});

//Risk Control/Mitigation Measures
Route::controller(RiskControlController::class)->group(function() {
    Route::get('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/risk-control', 'index')->name('oprForm.work.aspectImpact.riskControl.index');
    Route::get('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/risk-control-create', 'create')->name('oprForm.work.aspectImpact.riskControl.create');
    Route::post('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/risk-control-store', 'store')->name('oprForm.work.aspectImpact.riskControl.store');
    Route::get('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/risk-control/{risk_id}', 'edit')->name('oprForm.work.aspectImpact.riskControl.edit');
    Route::put('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/risk-control/{risk_id}', 'update')->name('oprForm.work.aspectImpact.riskControl.update');
    Route::delete('/opr-forms/{id}/works/{work_id}/aspect-impacts/{ai_id}/risk-control/{risk_id}/destroy', 'destroy')->name('oprForm.work.aspectImpact.riskControl.destroy');
});

Auth::routes();


