<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpvController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfficerController;

Route::get('/', function () {
    return view('welcome');
});

//Routse face -> users
Route::get('/face', function () {
    return view('face');
});

//Routse login -> users
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(
    function () {
        //Routse Admin -> users
        Route::get('/Admin', [AdminController::class, 'index'])->name('adminindex')->middleware('role:Admin');


        //Routse Spv -> index
        Route::get('/Spv', [SpvController::class, 'index'])->name('spvindex')->middleware('role:Spv');


        //Routse Officer -> index
        Route::get('/Officer', [OfficerController::class, 'index'])->name('officerindex')->middleware('role:Officer');
    }
);
