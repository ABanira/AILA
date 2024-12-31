<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lemari;
use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Models\CatalogAction;
use Illuminate\Support\Facades\Log;

class OfficerController extends Controller
{
    function index(Request $request)
    {
        $unitKerja = $request->input('unit_kerja');
        // Ambil data lemari berdasarkan lokasi_unit yang sama dengan unit_kerja pengguna yang sedang login 
        $lemaris = Lemari::where('lokasi_unit', $unitKerja)->with(['catalogs' => function ($query) {
            $query->select('id', 'nama_alat', 'lemari_id', 'lokasi_laci', 'status', 'kondisi_alat', 'jumlah');
        }])->orderBy('id')->paginate(1);
        return view('Officer/index', compact('lemaris'), ['title' => 'Halaman Officer']);
    }

    public function pinjam_kembali($lemariId, $laciId, $userId, $catalogId, Request $request)
    {
        try {
            $lemari = Lemari::findOrFail($lemariId);
            $user = User::findOrFail($userId);
            $catalog = Catalog::findOrFail($catalogId);

            // Ambil nama user dan nama lemari
            $userName = $user->name;
            $lemariName = $lemari->nama_lemari;

            // Toggle laci status
            $statusLaci = $lemari->{'laci_' . $laciId};
            $lemari->{'laci_' . $laciId} = $statusLaci == 1 ? 0 : 1;
            $lemari->save();


            // Toggle catalog status
            if ($catalog->status == $userId) {
                // Saat pengembalian
                $catalog->status = 0;
            } else {
                // Saat peminjaman
                $catalog->status = $userId;
            }
            $catalog->save();


            // Simpan ke tabel catalog_actions
            $actionDetail = "User {$userName} " . ($catalog->status == 0 ? "Mengembalikan Alat" : "Meminjam Alat") . " laci {$laciId} pada lemari {$lemariName}.";
            CatalogAction::create([
                'catalog_id' => $catalogId,
                'action_type' => $catalog->status == 0 ? 'Kembalikan' : 'Pinjam',
                'action_detail' => $actionDetail,
                'user_id' => $userId,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Status laci berhasil diubah.']);
        } catch (\Exception $e) {
            Log::error("Error in open_closelaci: " . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Terjadi kesalahan.'], 500);
        }
    }
}
