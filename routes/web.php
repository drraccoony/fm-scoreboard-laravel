<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\ActivityLogController;

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


/*
|--------------------------------------------------------------------------
| Auth User Routes
|--------------------------------------------------------------------------
|*/

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect('/dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/log/mine', [ActivityLogController::class, 'mine'])
    ->name('activity_log.mine');
});
  
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|*/
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/activities', [ActivitiesController::class, 'index'])
        ->name('activities');
    Route::get('/activities/create', [ActivitiesController::class, 'create'])
        ->name('activities.create');

});


require __DIR__.'/auth.php';
