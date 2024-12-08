<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/beranda', function () {
//     $judul = 'Halaman Admin';
//     return view('admin/home', 
//     ['title' => $judul],
//     ['data' => 'ini' .$judul] 
// );
// })->name('adminhome');

Route::get('/beranda', [AdminController::class, 'index'])->name('adminhome');
Route::get('/lemari', [AdminController::class, 'lemari']);
Route::get('/tambah_lemari', [AdminController::class, 'tambah_lemari']);
Route::post('/add_lemari', [AdminController::class, 'add_lemari']);

Route::get('/beranda/{id}', function (Request $request) {
    return redirect()->route ('adminhome');

});