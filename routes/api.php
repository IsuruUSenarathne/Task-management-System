<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/task/add', [TaskController::class, 'store']);
    Route::get('/task/list', [TaskController::class, 'index']);
    Route::delete('/task/{id}/delete', [TaskController::class, 'destroy']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});