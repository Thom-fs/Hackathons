<?php

use App\Http\Controllers\SlotController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GroupUserController;
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

/*Authentification*/

Route::post('/auth/register', [AuthController::class, 'createUser']);

Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');

// Déconnexion

Route::middleware('auth:sanctum')->get('/auth/logout', [AuthController::class, 'logout']);
// Permission


    Route::middleware('auth:sanctum')->get('/events', [EventController::class, 'index'])
    ->name('events.index');
    
    Route::middleware('auth:sanctum')->get('/events/{id}', [EventController::class, 'show'])
    ->name('events.show');
    Route::middleware('auth:sanctum')->post('/events', [EventController::class, 'store'])
    ->name('events.store');
    
    Route::middleware('auth:sanctum')->get('/registrations', [EventController::class, 'index'])
    ->name('registration.index');
    
    Route::middleware('auth:sanctum')->post('/registrations', [EventController::class, 'store'])
    ->name('registration.store');
   


/*SLOTS*/
Route::get('/slots', [SlotController::class, 'index'])->name('slots.index');

Route::post('/slots', [SlotController::class, 'store'])->name('slots.store');

/*GROUPS*/
Route::get('/groups', [GroupController::class, 'index'])
    ->name('groups.index');

Route::post('/groups', [GroupController::class, 'store'])
    ->name('groups.store');

/*EVENTS*/


/* GROUP USER */
Route::get('/userAdd', [GroupUserController::class, 'index'])
    ->name('userAdd.store');

Route::post('/userAdd', [GroupUserController::class, 'store'])
    ->name('userAdd.store');




// Attribution du role admin
// Route::middleware((['auth', 'role:admin']))->group(function () {
    
// });



/*EVENTS*/

