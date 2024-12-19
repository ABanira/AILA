<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfficerController extends Controller
{
    function index()
    {
        return view('Officer/index', ['title' => 'Halaman Officer']);
    }
}
