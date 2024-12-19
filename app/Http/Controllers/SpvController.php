<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpvController extends Controller
{
    function index()
    {
        return view('Spv/index', ['title' => 'Halaman Spv']);
    }
}
