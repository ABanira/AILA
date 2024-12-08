<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index()
    {
        return view('admin/home', ['title' =>'Halaman Admin']);
    }
    
    function lemari(Request $request)
    {
        $cari = $request->lemari_unit;
        $lemari  = DB::table('tlemari')->where('lemari_unit', 'LIKE', '%'.$cari.'%')->paginate(2);
        return view('admin/lemari', ['title' =>'Halaman Admin | Lemari', 'data' => $lemari, 'cari' => $cari] );
    }

    function tambah_lemari()
    {
        return view('admin/tambah_lemari', ['title' =>'Halaman Admin | Tambah Lemari']);
    }
    function add_lemari(Request $request)
    {
        DB::table('tlemari')->insert(
            [
                'lemari_nama' => $request->lemari_nama,
                'lemari_unit' => $request->lemari_unit,
                'lemari_ip' => $request->lemari_ip,
                'lemari_1' => $request->lemari_1,
                'lemari_2' => $request->lemari_2,
                'lemari_3' => $request->lemari_3,
                'lemari_4' => $request->lemari_4,
                'lemari_5' => $request->lemari_5,
                'lemari_6' => $request->lemari_6,
                'lemari_7' => $request->lemari_7,
                'lemari_8' => $request->lemari_8,
                'lemari_9' => $request->lemari_9,
                'lemari_10' => $request->lemari_10,
                'lemari_11' => $request->lemari_11,
                'lemari_12' => $request->lemari_12,
                'lemari_13' => $request->lemari_13,
                'lemari_14' => $request->lemari_14,
                'lemari_15' => $request->lemari_15,
                'lemari_16' => $request->lemari_16,
            ]);
            return view('admin/tambah_lemari', ['title' =>'Halaman Admin | Tambah Lemari']);
    }
}