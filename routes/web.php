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

Route::get('/beranda/{id}', function (Request $request) {
    // return view('admin/home', 
    // ['title' => 'Halaman Admin '],
    // ['data' => 'ini adalah halaman' .$request->id]);
    return redirect()->route ('adminhome');

});