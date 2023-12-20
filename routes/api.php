<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\FarmFantasyDNAController;
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

Route::post('/birds/minimum', [CalculatorController::class, 'calculateMinimumBirds']);
Route::post('/chocobo-dna/modify-and-hash', [FarmFantasyDNAController::class, 'modifyAndHash']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
