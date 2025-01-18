<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lemari;
use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Models\CatalogAction;
use Illuminate\Support\Facades\Log;

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

    public function open_closelaci($lemariId, $laciId, $userId, Request $request)
    {
        try {
            $lemari = Lemari::findOrFail($lemariId);
            $user = User::findOrFail($userId);

            // Ambil nama user dan nama lemari
            $userName = $user->name;
            $lemariName = $lemari->nama_lemari;

            // Toggle laci status
            $currentStatus = $lemari->{'laci_' . $laciId};
            $lemari->{'laci_' . $laciId} = $currentStatus == 0 ? 1 : 0;
            $lemari->save();

            // Simpan ke tabel catalog_actions
            $actionDetail = "User {$userName} " . ($currentStatus == 1 ? "mengunci" : "membuka") . " laci {$laciId} pada lemari {$lemariName}.";
            CatalogAction::create([
                'catalog_id' => null,
                'action_type' => $request->input('action_type'),
                'action_detail' => $actionDetail,
                'user_id' => $userId,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Status laci berhasil diubah.']);
        } catch (\Exception $e) {
            Log::error("Error in open_closelaci: " . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Terjadi kesalahan.'], 500);
        }
    }

    public function viewCatalog(Request $request, $lemari_id, $laci_id)
    {
        // Ambil data catalog berdasarkan lemari_id dan lokasi_laci
        $lemaris = Lemari::findOrFail($lemari_id);
        $lokasi_laci = 'laci_' . $laci_id;
        $catalog = Catalog::where('lemari_id', $lemari_id)
            ->where('lokasi_laci', $lokasi_laci)
            ->first();

        return view('Spv.viewcatalog', compact('lemaris', 'catalog', 'lemari_id', 'laci_id'), ['title' => 'Halaman List Lemari']);
    }

    public function logpinjam(Request $request)
    {
        // Mendapatkan unit_kerja dari pengguna yang sedang login
        $unitKerja = $request->input('unit_kerja');
        // Mengambil data CatalogAction dengan relasi ke tabel user
        $query = CatalogAction::with(['user'])
            ->whereHas('user', function ($query) use ($unitKerja) {
                // Membatasi data berdasarkan unit_kerja
                $query->where('unit_kerja', $unitKerja);
            });

        // Filter berdasarkan waktu jika ada
        if ($request->filled('start_date') && $request->filled('end_date')) {
            // Menambahkan waktu ke start_date dan end_date
            $startDate = \Carbon\Carbon::parse($request->start_date)->startOfDay();
            $endDate = \Carbon\Carbon::parse($request->end_date)->endOfDay();

            // Filter berdasarkan tanggal yang sudah diubah
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
        // Mendapatkan data yang sudah difilter dan diurutkan
        $actions = $query->orderBy('created_at', 'desc')->paginate(15);

        // Mengirim data ke view
        return view('Spv/logpinjam', compact('actions'), ['title' => 'Halaman Log Pinjam']);
    }
}
