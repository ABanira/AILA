<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpvController;
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
Route::get('/login', function () {
    return view('login');
});

//Routse Admin -> users
Route::get('/Admin', [AdminController::class, 'index'])->name('adminindex');


//Routse Spv -> index
Route::get('/Spv', [SpvController::class, 'index'])->name('spvindex');


//Routse Officer -> index
Route::get('/Officer', [OfficerController::class, 'index'])->name('officerindex');
