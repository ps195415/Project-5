<?php

use App\Http\Controllers\PresentatieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestOefeningenControl;
use App\Http\Controllers\AuthenticationController;
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

Route::get('Guest', [GuestOefeningenControl::class, 'index']);
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    //protected routes
    Route::apiResource('prestaties', PresentatieController::class);
    
});
