<?php

namespace App\Http\Controllers;


use App\Models\Lemari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    function index()
    {
        return view('admin/home', ['title' => 'Halaman Admin']);
        // $lemaris = Lemari::all();
        // return $lemaris;
    }

    function lemari(Request $request)
    {
        $cari = $request->lemari_unit;
        //$lemari  = DB::table('lemaris')->where('lemari_unit', 'LIKE', '%'.$cari.'%')->paginate(5);
        $lemaris = Lemari::where('lemari_unit', 'LIKE', '%' . $cari . '%')->paginate(5);
        return view('admin/lemari', ['title' => 'Halaman Admin | Lemari', 'data' => $lemaris, 'cari' => $cari]);
    }

    function tambah_lemari()
    {
        return view('admin/tambah_lemari', ['title' => 'Halaman Admin | Tambah Lemari']);
    }

    function add_lemari(Request $request)
    {
        $request->validate([
            'lemari_nama' => 'required',
            'lemari_unit' => 'required',
            'lemari_ip' =>  'required|unique:lemaris|max:15',
        ]);

        // DB::table('lemaris')->insert(
        //     [
        //         'lemari_nama' => $request->lemari_nama,
        //         'lemari_unit' => $request->lemari_unit,
        //         'lemari_ip' => $request->lemari_ip,
        //         'lemari_1' => $request->lemari_1,
        //         'lemari_2' => $request->lemari_2,
        //         'lemari_3' => $request->lemari_3,
        //         'lemari_4' => $request->lemari_4,
        //         'lemari_5' => $request->lemari_5,
        //         'lemari_6' => $request->lemari_6,
        //         'lemari_7' => $request->lemari_7,
        //         'lemari_8' => $request->lemari_8,
        //         'lemari_9' => $request->lemari_9,
        //         'lemari_10' => $request->lemari_10,
        //         'lemari_11' => $request->lemari_11,
        //         'lemari_12' => $request->lemari_12,
        //         'lemari_13' => $request->lemari_13,
        //         'lemari_14' => $request->lemari_14,
        //         'lemari_15' => $request->lemari_15,
        //         'lemari_16' => $request->lemari_16,
        //     ]);

        Lemari::create($request->all());

        Session::flash('message', 'Berhasil menambah data!!');
        return redirect()->route('adminlemari');
    }

    function detail_lemari($id)
    {
        // $detail = Lemari::where('id', $id)->first();
        // if(!$detail){
        //     abort(404);
        // }
        $detail = Lemari::findorfail($id);
        return view('admin/detail_lemari', ['title' => 'Halaman Admin | Detail Lemari | ' . $detail->lemari_nama . '', 'detail' => $detail]);
    }

    function edit_lemari($id)
    {
        $edit = Lemari::findorfail($id);
        return view('admin/edit_lemari', ['title' => 'Halaman Admin | Edit Lemari | ' . $edit->lemari_nama . '', 'edit' => $edit]);
    }

    function update_lemari(Request $request, $id)
    {
        $request->validate([
            'lemari_nama' => 'required',
            'lemari_unit' => 'required',
            'lemari_ip' =>  'required|unique:lemaris,lemari_ip, ' . $id . '|max:15',
        ]);

        // DB::table('lemaris')->where('id', $id)->update(
        //     [
        //         'lemari_nama' => $request->lemari_nama,
        //         'lemari_unit' => $request->lemari_unit,
        //         'lemari_ip' => $request->lemari_ip,
        //         'lemari_1' => $request->lemari_1,
        //         'lemari_2' => $request->lemari_2,
        //         'lemari_3' => $request->lemari_3,
        //         'lemari_4' => $request->lemari_4,
        //         'lemari_5' => $request->lemari_5,
        //         'lemari_6' => $request->lemari_6,
        //         'lemari_7' => $request->lemari_7,
        //         'lemari_8' => $request->lemari_8,
        //         'lemari_9' => $request->lemari_9,
        //         'lemari_10' => $request->lemari_10,
        //         'lemari_11' => $request->lemari_11,
        //         'lemari_12' => $request->lemari_12,
        //         'lemari_13' => $request->lemari_13,
        //         'lemari_14' => $request->lemari_14,
        //         'lemari_15' => $request->lemari_15,
        //         'lemari_16' => $request->lemari_16,
        //     ]);
        $update = Lemari::findorfail($id);
        $update->update($request->all());

        Session::flash('message', 'Berhasil Update data!!');
        return redirect()->route('adminlemari');
    }

    function hapus_lemari($id)
    {

        // DB::table('lemaris')->where('id', $id)->delete();

        $hapus = Lemari::findorfail($id);
        $hapus->delete();

        Session::flash('message', 'Berhasil Hapus data!!');
        return redirect()->route('adminlemari');
    }
}
