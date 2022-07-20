<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\EventController;
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


Route::get('/groups', [GroupController::class, 'index'])
    ->name('groups.index');

Route::post('/groups', [GroupController::class, 'store'])
    ->name('groups.store');
Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::post('/events', [EventController::class, 'store'])->name('events.store');
