<?php

use App\Http\Controllers\SlotController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GroupUserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ModifyProfilController;
use App\Http\Controllers\AbilitiesController;
use App\Http\Controllers\EventUserController;
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


/* _________________________________SLOTS*/
Route::get('/slots', [SlotController::class, 'index'])->name('slots.index');

Route::post('/slots', [SlotController::class, 'store'])->name('slots.store');

/* _________________________________GROUPS*/

/**
 * La route "groups.index" donne la liste des groupes liés à l'événement consulté, on lui passe donc event_id en argument {id}
 */
Route::get('/events/{event_id}/groups', [GroupController::class, 'index'])
    ->name('groups.index');

Route::get('/groups/{group_id}', [GroupController::class, 'show'])
    ->name('groups.show');

Route::post('/groups', [GroupController::class, 'store'])
    ->name('groups.store');

/* _________________________________EVENTS*/
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

/* ________________EVENT USERS_________*/
Route::get('/event_users', [EventUserController::class, 'index'])
    ->name('event_users.index');

Route::get('/event_users/{id}', [EventUserController::class, 'show'])
    ->name('event_users.show');

/* _________________________________GROUP USER */

/**
 * Route pour l'affichage des participants qui font partie d'un groupe dont on connaît l'id : {group_id}
 */
Route::get('/group-users/{group_id}', [GroupUserController::class, 'index'])
    ->name('group-users.index');

Route::post('/userAdd', [GroupUserController::class, 'store'])
    ->name('userAdd.store');

/* _________________________________SLOTS*/
Route::get('/slots', [SlotController::class, 'index'])
    ->name('slots.index');

Route::post('/slots', [SlotController::class, 'store'])
    ->name('slots.store');

// _________________________________USER
Route::get('/profil/{id}', [ProfilController::class, 'show'])
    ->name('profil.show');


/* _________________________________Authentification*/

Route::post('/auth/register', [AuthController::class, 'createUser']);

Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');

/*modification profil*/

Route::post('/modifyProfil', [ModifyProfilController::class, 'store'])
    ->name('modifyProfil.store');

Route::get('/modifyProfil/{id}', [ModifyProfilController::class, 'show'])
    ->name('modifyProfil.show');

/*Les compétences*/

Route::post('/abilities', [AbilitiesController::class, 'store'])
    ->name('abilities.store');

Route::get('/abilities', [AbilitiesController::class, 'index'])
    ->name('abilities.index ');

/* __________________ADMIN________*/
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
