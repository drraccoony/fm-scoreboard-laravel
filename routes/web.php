<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\UsersController;

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

    Route::get('/teams', [TeamsController::class, 'index'])
        ->name('teams');
});

    Route::get('/activities', [ActivitiesController::class, 'index'])
        ->name('activities');
    Route::get('/activities/create', [ActivitiesController::class, 'create'])
        ->name('activities.create');
    Route::post('/activities/create', [ActivitiesController::class, 'store'])
        ->name('activities.store');

    Route::get('/teams/create', [TeamsController::class, 'create'])
        ->name('teams.create');
    Route::post('/teams/create', [TeamsController::class, 'store'])
        ->name('teams.store');
    Route::get('/teams/{team}/edit', [TeamsController::class, 'edit'])
        ->name('teams.edit');
    Route::put('/teams/{team}/update', [TeamsController::class, 'update'])
        ->name('teams.update');


Route::get('/activities', [ActivitiesController::class, 'index'])
    ->middleware(['auth'])->name('activities');
Route::get('/activities/create', [ActivitiesController::class, 'create'])
    ->middleware(['auth'])->name('activities.create');
Route::post('/activities/create', [ActivitiesController::class, 'store'])
    ->middleware(['auth'])->name('activities.store');

Route::get('/log/mine', [ActivityLogController::class, 'mine'])
    ->middleware(['auth'])->name('activity_log.mine');

Route::get('/users', [UsersController::class, 'index'])
    ->middleware(['auth'])->name('users');

Route::get('/users/{id}/edit', [UsersController::class, 'edit'])
    ->middleware(['auth'])->name('user.edit');

Route::get('/users/{id}/confirm', [UsersController::class, 'confirm'])
    ->middleware(['auth'])->name('user.confirm')->withTrashed();

Route::get('/users/{id}/delete', [UsersController::class, 'delete'])
    ->middleware(['auth'])->name('user.delete');

// Route::get('/activities', function () {
//     return view('activities.index');
// })->middleware(['auth'])->name('activities');

require __DIR__.'/auth.php';
