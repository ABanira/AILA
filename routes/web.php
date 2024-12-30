<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpvController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfficerController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});

//Routse login  password-> users
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//Routse face -> users
Route::get('/face', [AuthController::class, 'face'])->name('face');
Route::post('/loginface', [AuthController::class, 'loginface'])->name('loginface');

//Routse logout -> users
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware('auth')->group(
    function () {
        //Routse Admin
        Route::get('/Admin', [AdminController::class, 'index'])->name('adminindex')->middleware('role:Admin');
        //Routse Admin -> users
        Route::get('/user', [AdminController::class, 'user'])->name('usermanage')->middleware('role:Admin');
        Route::get('/{id}/viewuser', [AdminController::class, 'viewuser'])->name('viewuser')->middleware('role:Admin');
        Route::get('/tambah_user', [AdminController::class, 'tambah_user'])->name('useradd')->middleware('role:Admin');
        Route::post('/add_user', [AdminController::class, 'store_user'])->middleware('role:Admin');
        Route::get('/{user}/edituser', [AdminController::class, 'edituser'])->name('edituser')->middleware('role:Admin');
        Route::put('/updateuser/{user}', [AdminController::class, 'updateuser'])->name('updateuser')->middleware('role:Admin');
        Route::delete('/delete_user/{id}', [AdminController::class, 'destroy_user'])->middleware('role:Admin');

        //Routse Admin -> lemari
        Route::get('/lemari', [AdminController::class, 'lemari'])->name('lemarialat')->middleware('role:Admin');
        Route::get('/{id}/viewlemari', [AdminController::class, 'viewlemari'])->name('viewlemari')->middleware('role:Admin');
        Route::get('/tambah_lemari', [AdminController::class, 'tambah_lemari'])->name('lemariadd')->middleware('role:Admin');
        Route::post('/add_lemari', [AdminController::class, 'store_lemari'])->middleware('role:Admin');
        Route::get('/{id}/editlemari', [AdminController::class, 'editlemari'])->name('editlemari')->middleware('role:Admin');
        Route::put('/updatelemari/{id}', [AdminController::class, 'updatelemari'])->name('updatelemari')->middleware('role:Admin');
        Route::delete('/delete_lemari/{id}', [AdminController::class, 'destroy_lemari'])->middleware('role:Admin');


        //Routse Spv -> index
        Route::get('/Spv', [SpvController::class, 'index'])->name('spvindex')->middleware('role:Spv');
        Route::get('/catalog', [SpvController::class, 'catalogspv'])->name('catalogspv')->middleware('role:Spv', 'check.unit.kerja');
        Route::get('/editcatalog/{lemari_id}/{laci_id}', [SpvController::class, 'editCatalog'])->name('editcatalog')->middleware('role:Spv');
        Route::post('/updateOrCreateCatalog', [SpvController::class, 'updateOrCreateCatalog'])->name('updateOrCreateCatalog')->middleware('role:Spv');
        Route::put('/open_close/{lemariId}/{laciId}', [SpvController::class, 'open_closelaci'])->middleware('role:Spv');

        //Routse Officer -> index
        Route::get('/Officer', [OfficerController::class, 'index'])->name('officerindex')->middleware('role:Officer');
    }
);
