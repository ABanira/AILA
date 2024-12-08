<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->lemari_nama;
        $lemari  = DB::table('tlemari')->where('lemari_nama', 'LIKE', '%'.$cari.'%')->paginate(2);
        return view('admin/home', 
        ['title' => $lemari, 'data' => $lemari, 'cari' => $cari] 
    );
    }
}