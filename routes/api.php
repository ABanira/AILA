<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LemariController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Routse Control Lemari esp8266
Route::get('/lemari-by-ip', [LemariController::class, 'getLemariByIP']);
Route::post('/update-laci-status', [LemariController::class, 'updateLaciStatus']);
