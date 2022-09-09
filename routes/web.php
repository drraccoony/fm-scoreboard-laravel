<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;

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
| Welcome Route
|--------------------------------------------------------------------------
|*/

Route::get('welcome', [GeneralController::class, 'welcome'])
    ->name('welcome');

/*
|--------------------------------------------------------------------------
| Auth User Routes
|--------------------------------------------------------------------------
|*/

Route::middleware(['forceChangePassword'])->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', function () {
            return redirect('/dashboard');
        });

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/activities', [ActivitiesController::class, 'index'])
            ->name('activities');

        Route::controller(ActivityLogController::class)
            ->name('log')
            ->group(function () {
                Route::get('/log', 'viewLog');
                Route::get('/log/{activity}', 'logActivity')
                    ->name('.activity');
            });

        Route::get('/profile', [UsersController::class, 'edit'])
            ->name('users.edit');

        Route::get('/teams', [TeamsController::class, 'index'])
            ->name('teams');

        Route::controller(TeamsController::class)
            ->name('teams')
            ->group(function () {
                Route::get('/teams/{team}/join', 'join')
                    ->name('.join');
            });
    });


    /*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|*/
    Route::middleware(['auth', 'admin'])->group(function () {

        Route::controller(ActivitiesController::class)
            ->name('activities')
            ->group(function () {
                Route::get('/activities/create', 'create')
                    ->name('.create');
                Route::post('/activities/create', 'store')
                    ->name('.store');
                Route::get('/activities/{activity}/view', 'view')
                    ->name('.view');
                Route::get('/activities/{activity}/edit', 'edit')
                    ->name('.edit');
                Route::put('/activities/{activity}/update', 'update')
                    ->name('.update');
            });

        Route::get('/users/{user}/log', [ActivityLogController::class, 'viewUserLog'])
            ->name('users.log');

        Route::controller(UsersController::class)
            ->name('users')
            ->group(function () {
                Route::get('/users', 'index');
                Route::get('/users/{user}/edit', 'editUser')
                    ->name('.editUser');
                Route::get('/users/{user}/confirm', 'confirm')
                    ->name('.confirm')
                    ->withTrashed();
                Route::get('/users/{user}/delete', 'delete')
                    ->name('.delete');
                Route::put('/users/{user}/update', 'update')
                    ->name('.update');
            });

        Route::controller(TeamsController::class)
            ->name('teams')
            ->group(function () {
                Route::get('/teams/create', 'create')
                    ->name('.create');
                Route::post('/teams/create', 'store')
                    ->name('.store');
                Route::get('/teams/{team}/edit', 'edit')
                    ->name('.edit');
                Route::put('/teams/{team}/update', 'update')
                    ->name('.update');
                Route::get('/teams/nullteam', 'null_team')
                    ->name('.nullteam');
            });
    });
});

// Route::get('/activities', function () {
//     return view('activities.index');
// })->middleware(['auth'])->name('activities');

require __DIR__ . '/auth.php';
