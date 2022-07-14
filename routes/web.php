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

Route::get('/', function () {
    return redirect('/dashboard');
    // return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/activities', [ActivitiesController::class, 'index'])
    ->middleware(['auth'])->name('activities');

Route::get('/log/mine', [ActivityLogController::class, 'mine'])
    ->middleware(['auth'])->name('activity_log.mine');

// Route::get('/activities', function () {
//     return view('activities.index');
// })->middleware(['auth'])->name('activities');

require __DIR__.'/auth.php';
