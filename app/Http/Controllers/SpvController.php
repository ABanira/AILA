<?php

namespace App\Http\Controllers;

use App\Models\Lemari;
use App\Models\Catalog;
use Illuminate\Http\Request;

class SpvController extends Controller
{
    function index()
    {
        return view('Spv/index', ['title' => 'Halaman Spv']);
    }

    function catalogspv(Request $request)
    {
        $unitKerja = $request->input('unit_kerja');
        // Ambil data lemari berdasarkan lokasi_unit yang sama dengan unit_kerja pengguna yang sedang login 
        $lemaris = Lemari::where('lokasi_unit', $unitKerja)->with(['catalogs' => function ($query) {
            $query->select('id', 'nama_alat', 'lemari_id', 'lokasi_laci', 'status', 'kondisi_alat', 'jumlah');
        }])->orderBy('id')->paginate(1);
        return view('Spv/lemarimanage', compact('lemaris'), ['title' => 'Halaman List Lemari']);
    }

    public function editCatalog(Request $request, $lemari_id, $laci_id)
    {
        // Ambil data catalog berdasarkan lemari_id dan lokasi_laci
        $lemaris = Lemari::findOrFail($lemari_id);
        $lokasi_laci = 'laci_' . $laci_id;
        $catalog = Catalog::where('lemari_id', $lemari_id)
            ->where('lokasi_laci', $lokasi_laci)
            ->first();

        return view('Spv.editcatalog', compact('lemaris', 'catalog', 'lemari_id', 'laci_id'), ['title' => 'Halaman List Lemari']);
    }

    public function updateOrCreateCatalog(Request $request)
    {
        $request->validate([
            'lemari_id' => 'required|exists:lemaris,id',
            'lokasi_laci' => 'required|string',
            'nama_alat' => 'required|string|max:255',
            'kondisi_alat' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'img_alat' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi file gambar
        ]);

        $data = [
            'nama_alat' => $request->input('nama_alat'),
            'kondisi_alat' => $request->input('kondisi_alat'),
            'jumlah' => $request->input('jumlah'),
        ];

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('img_alat')) {
            $lemariId = $request->input('lemari_id');
            $lokasiLaci = $request->input('lokasi_laci');
            $file = $request->file('img_alat');

            // Direktori penyimpanan di public
            $directory = 'alats/' . $lemariId;
            $filename = $lokasiLaci . '.png';

            // Simpan file ke storage/app/public/alat/{lemari_id}
            $file->storeAs($directory, $filename, 'public');

            // Simpan nama file ke database (path relatif dari public)
            $data['img_alat'] = 'alats/' . $lemariId . '/' . $filename;
        }


        // Update atau buat data baru
        $catalog = Catalog::updateOrCreate(
            [
                'lemari_id' => $request->input('lemari_id'),
                'lokasi_laci' => $request->input('lokasi_laci'),
            ],
            $data
        );

        return redirect()->route('catalogspv')->with('status', 'Catalog berhasil disimpan!');
    }

    public function open_closelaci($lemariId, $laciId)
    {
        try {
            // Cari lemari berdasarkan ID
            $lemari = Lemari::findOrFail($lemariId);

            // Tentukan kolom laci yang akan diubah
            $laciField = 'laci_' . $laciId;

            // Pastikan kolom laci ada dalam tabel
            if (!isset($lemari->$laciField)) {
                return response()->json(['message' => 'Laci tidak valid.'], 400);
            }

            // Toggle status laci: 0 menjadi 1, atau 1 menjadi 0
            $lemari->$laciField = $lemari->$laciField == 0 ? 1 : 0;
            $lemari->save();

            return response()->json(['message' => 'Laci berhasil diperbarui.', 'status' => $lemari->$laciField], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat membuka/mengunci laci.', 'error' => $e->getMessage()], 500);
        }
    }
}
