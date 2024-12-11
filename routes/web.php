<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LemariController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'index'])->name('adminhome');
Route::get('/beranda', [AdminController::class, 'index'])->name('adminhome');
Route::get('/beranda/{id}', function (Request $request) {
    return redirect()->route('adminhome');
});

//Routse Users
Route::get('/admin/users', [UserController::class, 'users'])->name('adminusers');
Route::get('/admin/tambah_users', [UserController::class, 'tambah_users']);
Route::post('/admin/add_users', [UserController::class, 'add_users']); //proses
Route::get('/admin/{id}/detail_users', [UserController::class, 'detail_users']);
Route::get('/admin/{id}/edit_users', [UserController::class, 'edit_users']);
Route::patch('/admin/{id}/update_users', [UserController::class, 'update_users']); //proses
Route::get('/admin/{id}/hapus_users', [UserController::class, 'hapus_users']); //proses

///Routes Lemari
Route::get('/admin/lemari', [LemariController::class, 'lemari'])->name('adminlemari');
Route::get('/admin/tambah_lemari', [LemariController::class, 'tambah_lemari']);
Route::post('/admin/add_lemari', [LemariController::class, 'add_lemari']); //proses
Route::get('/admin/{id}/detail_lemari', [LemariController::class, 'detail_lemari']);
Route::get('/admin/{id}/edit_lemari', [LemariController::class, 'edit_lemari']);
Route::patch('/admin/{id}/update_lemari', [LemariController::class, 'update_lemari']); //proses
Route::get('/admin/{id}/hapus_lemari', [LemariController::class, 'hapus_lemari']);//proses
