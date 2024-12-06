<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        $judul = 'Halaman Admin';
        return view('admin/home', 
        ['title' => $judul],
        ['data' => 'ini '.$judul] 
    );
    }
}