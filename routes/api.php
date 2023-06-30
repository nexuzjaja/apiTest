<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApplicantsController;
use App\Http\Controllers\Api\SkillsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('applicants', [ApplicantsController::class, 'index']);
Route::post('applicants', [ApplicantsController::class, 'store']);
Route::get('applicants/{id}', [ApplicantsController::class, 'show']);
Route::put('applicants/{id}/edit', [ApplicantsController::class, 'update']);
Route::delete('applicants/{id}/destroy', [ApplicantsController::class, 'destroy']);

Route::get('skills', [SkillsController::class, 'index']);
Route::post('skills', [SkillsController::class, 'store']);
Route::get('skills/{id}', [SkillsController::class, 'show']);
Route::put('skills/{id}/edit', [SkillsController::class, 'update']);
Route::delete('skills/{id}/destroy', [SkillsController::class, 'destroy']);

