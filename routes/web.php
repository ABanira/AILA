<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpvController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfficerController;

Route::get('/', function () {
    return view('welcome');
});

//Routse login  password-> users
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//Routse face -> users
Route::get('/face', [AuthController::class, 'face'])->name('face');

//Routse logout -> users
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware('auth')->group(
    function () {
        //Routse Admin -> users
        Route::get('/Admin', [AdminController::class, 'index'])->name('adminindex')->middleware('role:Admin');
        Route::get('/user', [AdminController::class, 'user'])->name('usermanage')->middleware('role:Admin');
        Route::get('/tambah_user', [AdminController::class, 'tambah_user'])->name('useradd')->middleware('role:Admin');
        Route::post('/add_user', [AdminController::class, 'store_user'])->middleware('role:Admin');
        Route::delete('/delete_user/{id}', [AdminController::class, 'destroy_user'])->middleware('role:Admin');
        Route::get('/loker', [AdminController::class, 'loker'])->name('lokertool')->middleware('role:Admin');


        //Routse Spv -> index
        Route::get('/Spv', [SpvController::class, 'index'])->name('spvindex')->middleware('role:Spv');


        //Routse Officer -> index
        Route::get('/Officer', [OfficerController::class, 'index'])->name('officerindex')->middleware('role:Officer');
    }
);
