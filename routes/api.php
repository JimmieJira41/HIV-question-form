<?php

use App\Http\Controllers\AnswerUserController;
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

Route::post('/submit', [AnswerUserController::class, 'store']);
Route::get('/get-information-user/{id}', [AnswerUserController::class, 'show']);
Route::get('/information', [AnswerUserController::class, 'index']);

