<?php

use App\Http\Controllers\SlotController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GroupUserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*SLOTS*/
Route::get('/slots', [SlotController::class, 'index'])->name('slots.index');

Route::post('/slots', [SlotController::class, 'store'])->name('slots.store');

/*GROUPS*/
Route::get('/groups', [GroupController::class, 'index'])
    ->name('groups.index');

Route::post('/groups', [GroupController::class, 'store'])
    ->name('groups.store');

/*EVENTS*/
Route::get('/events', [EventController::class, 'index'])
    ->name('events.index');

Route::post('/events', [EventController::class, 'store'])
    ->name('events.store');

Route::get('/events/{id}', [EventController::class, 'show'])
    ->name('events.show');

Route::get('/events', [EventController::class, 'index'])
    ->name('events.index');
Route::get('/registrations', [EventController::class, 'index'])
    ->name('registration.index');

Route::post('/registrations', [EventController::class, 'store'])
    ->name('registration.store');

/* GROUP USER */
Route::get('/userAdd', [GroupUserController::class, 'index'])
    ->name('userAdd.store');

Route::post('/userAdd', [GroupUserController::class, 'store'])
    ->name('userAdd.store');

/*SLOTS*/
Route::get('/slots', [SlotController::class, 'index'])
    ->name('slots.index');

Route::post('/slots', [SlotController::class, 'store'])
    ->name('slots.store');

// USER
Route::get('/profil/{id}', [ProfilController::class, 'show'])
    ->name('profil.show');


/*Authentification*/

Route::post('/auth/register', [AuthController::class, 'createUser']);

Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');

/*attribution des roles*/
