<?php

use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('v1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);

    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group( function () {

        Route::get('user', function (Request $request){ return $request->user(); });
        Route::resource('agency', v1\AgencyController::class);
    });


//    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//        return $request->user();
//    });


});
