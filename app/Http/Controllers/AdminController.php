<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('Admin/index', ['title' => 'Halaman Admin']);
    }
    //list Pengguna
    function user()
    {
        return view('Admin/usermanage', ['title' => 'Halaman List Pengguna']);
    }
    //list Lemari Alat
    function loker()
    {
        return view('Admin/usermanage', ['title' => 'Halaman List Pengguna']);
    }
}
