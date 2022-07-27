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
use App\Http\Controllers\ShowUserController;

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

// middleware('auth:sanctum')-> authorization
/* _________________________________EVENTS*/

// Route::middleware('auth:sanctum')->get('/events', [EventController::class, 'index'])
//     ->name('events.index');

// Route::middleware('auth:sanctum')->get('/events/{id}', [EventController::class, 'show'])
//     ->name('events.show');
// Route::middleware('auth:sanctum')->post('/events', [EventController::class, 'store'])
//     ->name('events.store');

// Route::middleware('auth:sanctum')->get('/registrations', [EventController::class, 'index'])
//     ->name('registration.index');

// Route::middleware('auth:sanctum')->post('/registrations', [EventController::class, 'store'])
//     ->name('registration.store');

Route::get('/events', [EventController::class, 'index'])
    ->name('events.index');


Route::middleware(["auth:sanctum", "role:staff"])->get('/events/{id}', [EventController::class, 'show'])
    ->name('events.show');

Route::post('/events', [EventController::class, 'store'])
    ->name('events.store');

Route::get('/registrations', [EventController::class, 'index'])
    ->name('registration.index');

Route::post('/registrations', [EventController::class, 'store'])
    ->name('registration.store');

Route::delete('/events/{id}', [EventController::class, 'destroy.id'])
    ->name('events.destroy.id');


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

/* ________________EVENT USERS_________*/
Route::get('/event-users', [EventUserController::class, 'index'])
    ->name('event-users.index');

Route::get('/event-users/{id}', [EventUserController::class, 'show'])
    ->name('event-users.show');

Route::middleware("auth:sanctum")->post('/event-users', [EventUserController::class, 'store'])
    ->name('event-users.store');


/* _________________________________GROUP USER */

/**
 * Route pour l'affichage des participants qui font partie d'un groupe dont on connaît l'id : {group_id}
 */
Route::get('/group-users/{group_id}', [GroupUserController::class, 'index'])
    ->name('group-users.index');

Route::post('/group-users', [GroupUserController::class, 'store'])
    ->name('group-users.store');

/* _________________________________SLOTS*/
Route::get('/slots', [SlotController::class, 'index'])
    ->name('slots.index');

Route::post('/slots', [SlotController::class, 'store'])
    ->name('slots.store');

// _________________________________USER
Route::get('/profil/{id}', [ProfilController::class, 'show'])
    ->name('profil.show');

Route::middleware("auth:sanctum")->get('/my-profile', [ProfilController::class, 'showOwn'])
    ->name('my-profile.showOwn');


/* _________________________________Authentification*/

// Attribution du role admin
// Route::middleware((['auth', 'role:admin']))->group(function () {

// });



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

/*
Telecharger fichier/photo dans modif profil
*/
// Route::get('/upload-file', [FileUploadController::class, 'createForm'])
// ->name('createForm');

Route::post('/upload-picture', [ModifyProfilController::class, 'store'])
    ->name('PictureUpload.store');

/* __________________ADMIN________*/
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
/* ShowUser affichage des users */

Route::get('/showusers', [ShowUserController::class, 'index'])
    ->name('showusers.index');
