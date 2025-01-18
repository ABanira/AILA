<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lemari;
use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Models\CatalogAction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    function index()
    {
        return view('Admin/index', ['title' => 'Halaman Admin']);
    }

    // Management Users
    public function user(Request $request)
    {
        $query = $request->input('query');
        if ($query) {
            $users = User::where('name', 'like', '%' . $query . '%')
                        ->orWhere('nipp', 'like', '%' . $query . '%')
                        ->orWhere('email', 'like', '%' . $query . '%')
                        ->simplePaginate(10);  // Simple pagination
        } else {
            $users = User::simplePaginate(10);  // Simple pagination
        }
        return view('Admin.usermanage', compact('users', 'query'), ['title' => 'Halaman List Pengguna']);
    }

    function viewuser($id)
    {
        $user = User::findOrFail($id);
        return view('Admin/viewuser', compact('user'), ['title' => 'Halaman Rincian Pengguna',]);
    }

    function tambah_user()
    {
        return view('Admin/useradd', ['title' => 'Halaman Tambah Pengguna']);
    }

    public function store_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nipp' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'tlpn' => 'required|string|max:255|unique:users',
            'role' => 'required|string|max:255',
            'password' => 'required|string|min:5',
            'unit_kerja' => 'required|string|max:255',
            'id_img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->nipp = $request->nipp;
        $user->email = $request->email;
        $user->tlpn = $request->tlpn;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->unit_kerja = $request->unit_kerja;

        if ($request->hasFile('id_img')) {
            $file = $request->file('id_img');
            $filename = '1.png';
            $folder = 'labels/' . $request->nipp;
            $path = $file->storeAs($folder, $filename, 'public');
            $user->id_img = $filename;
        }

        $user->save();

        return redirect('user')->with('status', 'User berhasil disimpan!');
    }

    public function destroy_user($id)
    {
        try {
            $user = User::findOrFail($id);

            if ($user->id_img) {
                $folder = storage_path('app/public/labels/' . $user->nipp);
                Log::info('Folder path: ' . $folder); // Tambahkan log untuk memeriksa path
                if (is_dir($folder)) {
                    $files = glob($folder . '/*'); // Dapatkan semua file di folder
                    foreach ($files as $file) {
                        if (is_file($file)) {
                            unlink($file); // Hapus file
                        }
                    }
                    rmdir($folder); // Hapus folder
                } else {
                    Log::info('Folder does not exist: ' . $folder);
                }
            }

            $user->delete();

            return response()->json(['status' => 'User berhasil dihapus!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'Terjadi kesalahan saat menghapus user.', 'error' => $e->getMessage()], 500);
        }
    }

    function edituser($user)
    {
        $user = User::findOrFail($user);
        return view('Admin/edituser', compact('user'), ['title' => 'Halaman Edit Pengguna',]);
    }

    public function updateuser(Request $request, User $user)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nipp' => 'required|numeric|unique:users,nipp,' . $user->id, // Unik kecuali untuk user yang sedang diedit
            'email' => 'required|email|unique:users,email,' . $user->id, // Unik kecuali untuk user yang sedang diedit
            'tlpn' => 'required|numeric|unique:users,tlpn,' . $user->id, // Unik kecuali untuk user yang sedang diedit
            'role' => 'required|string',
            'unit_kerja' => 'required|string',
            'id_img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi foto (optional)
            'password' => 'nullable|string|confirmed|min:5', // Hanya validasi password jika diubah
        ]);

        // 1. Cek apakah password baru diinputkan
        if ($request->filled('password')) {
            // Jika ada password baru, enkripsi dan simpan
            $validatedData['password'] = bcrypt($request->password);
        } else {
            // Jika password kosong, jangan ubah password yang lama
            unset($validatedData['password']);
        }

        // 2. Update data user dengan password (jika ada perubahan)
        $user->update($validatedData);
        // Menangani upload gambar jika ada
        if ($request->hasFile('id_img')) {
            // Hapus foto lama jika ada
            $oldImagePath = public_path('storage/labels/' . $user->nipp . '/1.png');
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Hapus foto lama
            }

            // 3.1. Upload foto baru dan ubah menjadi format PNG
            $image = $request->file('id_img');
            $imagePath = public_path('storage/labels/' . $user->nipp);

            // Pastikan folder berdasarkan NIPP ada
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true); // Buat folder jika belum ada
            }

            // Ubah format foto menjadi PNG dan simpan dengan nama '1.png'
            $imageName = '1.png';
            $image->storeAs('labels/' . $user->nipp, $imageName, 'public');

            // Simpan nama file foto baru
            $user->id_img = '1.png';
        }
        // Simpan perubahan ke database
        $user->save();

        // Redirect dengan pesan sukses
        return redirect('user')->with('status', 'User berhasil disimpan!');
    }

    //Manage Lemari Alat
    public function lemari(Request $request)
    {
        // Ambil query pencarian dari input
        $query = $request->input('query');
    
        // Jika ada query pencarian, lakukan pencarian berdasarkan lokasi_unit, nama_lemari, atau ip_control
        if ($query) {
            $lemaris = Lemari::where('lokasi_unit', 'like', '%' . $query . '%')
                            ->orWhere('nama_lemari', 'like', '%' . $query . '%')
                            ->orWhere('ip_control', 'like', '%' . $query . '%')
                            ->orderBy('lokasi_unit', 'asc')
                            ->simplePaginate(10);
        } else {
            // Jika tidak ada pencarian, ambil semua lemari dan paginasi
            $lemaris = Lemari::orderBy('lokasi_unit', 'asc')->simplePaginate(10);
        }
    
        // Kirim data ke view
        return view('Admin.lemarimanage', compact('lemaris', 'query'), ['title' => 'Halaman List Lemari']);
    }

    function tambah_lemari()
    {
        return view('Admin/lemariadd', ['title' => 'Halaman Tambah Lemari']);
    }

    function store_lemari(Request $request)
    {
        // Validasi data 
        $request->validate([
            'nama_lemari' => 'required|string|max:255',
            'ip_control' => 'required|ip|unique:lemaris',
            'lokasi_unit' => 'required|string|max:255',
            'laci_1' => 'nullable|integer',
            'laci_2' => 'nullable|integer',
            'laci_3' => 'nullable|integer',
            'laci_4' => 'nullable|integer',
            'laci_5' => 'nullable|integer',
            'laci_6' => 'nullable|integer',
            'laci_7' => 'nullable|integer',
            'laci_8' => 'nullable|integer',
        ]);

        // Tentukan status aktif berdasarkan nilai input 
        $laci_1 = $request->input('laci_1', 2);
        $laci_2 = $request->input('laci_2', 2);
        $laci_3 = $request->input('laci_3', 2);
        $laci_4 = $request->input('laci_4', 2);
        $laci_5 = $request->input('laci_5', 2);
        $laci_6 = $request->input('laci_6', 2);
        $laci_7 = $request->input('laci_7', 2);
        $laci_8 = $request->input('laci_8', 2);

        // Simpan data ke database 
        Lemari::create([
            'nama_lemari' => $request->nama_lemari,
            'ip_control' => $request->ip_control,
            'lokasi_unit' => $request->lokasi_unit,
            'laci_1' => $laci_1,
            'laci_2' => $laci_2,
            'laci_3' => $laci_3,
            'laci_4' => $laci_4,
            'laci_5' => $laci_5,
            'laci_6' => $laci_6,
            'laci_7' => $laci_7,
            'laci_8' => $laci_8,
        ]);
        return redirect('lemari')->with('status', 'Lemari berhasil disimpan!');
    }

    public function destroy_lemari($id)
    {
        try {
            $lemari = Lemari::with('catalogs')->findOrFail($id);

            // Hapus file dan folder berdasarkan lemari_id
            $folderPath = storage_path('app/public/alats/' . $lemari->id);

            if (is_dir($folderPath)) {
                // Hapus semua file dalam folder
                $files = glob($folderPath . '/*'); // Ambil semua file dalam folder
                foreach ($files as $file) {
                    if (is_file($file)) {
                        unlink($file); // Hapus file
                    }
                }
                // Hapus folder
                rmdir($folderPath);
            }

            // Hapus lemari beserta data catalog terkait
            $lemari->delete();

            return response()->json(['status' => 'Lemari dan folder terkait berhasil dihapus!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'Terjadi kesalahan saat menghapus lemari.', 'error' => $e->getMessage()], 500);
        }
    }

    function editlemari($id)
    {
        $lemari = Lemari::findOrFail($id);
        return view('Admin/editlemari', compact('lemari'), ['title' => 'Halaman Edit Lemari',]);
    }

    function viewlemari($id)
    {
        $lemari = Lemari::findOrFail($id);
        return view('Admin/viewlemari', compact('lemari'), ['title' => 'Halaman Edit Lemari',]);
    }

    public function updatelemari(Request $request, $id)
    {
        // Validasi data 
        $request->validate([
            'nama_lemari' => 'required|string|max:255',
            'ip_control' => 'required|ip|unique:lemaris,ip_control,' . $id,
            'lokasi_unit' => 'required|string|max:255',
            'laci_1' => 'nullable|integer',
            'laci_2' => 'nullable|integer',
            'laci_3' => 'nullable|integer',
            'laci_4' => 'nullable|integer',
            'laci_5' => 'nullable|integer',
            'laci_6' => 'nullable|integer',
            'laci_7' => 'nullable|integer',
            'laci_8' => 'nullable|integer',
        ]);
        // Tentukan status aktif berdasarkan nilai input 

        $laci_1 = $request->input('laci_1', 2);
        $laci_2 = $request->input('laci_2', 2);
        $laci_3 = $request->input('laci_3', 2);
        $laci_4 = $request->input('laci_4', 2);
        $laci_5 = $request->input('laci_5', 2);
        $laci_6 = $request->input('laci_6', 2);
        $laci_7 = $request->input('laci_7', 2);
        $laci_8 = $request->input('laci_8', 2);

        // Update data di database 
        $lemari = Lemari::findOrFail($id);
        $lemari->update([
            'nama_lemari' => $request->nama_lemari,
            'ip_control' => $request->ip_control,
            'lokasi_unit' => $request->lokasi_unit,
            'laci_1' => $laci_1,
            'laci_2' => $laci_2,
            'laci_3' => $laci_3,
            'laci_4' => $laci_4,
            'laci_5' => $laci_5,
            'laci_6' => $laci_6,
            'laci_7' => $laci_7,
            'laci_8' => $laci_8,
        ]);

        return redirect('lemari')->with('status', 'Lemari berhasil disimpan!');
    }

    // log buka tutup laci lemari kerja
    public function loglemari(Request $request)
    {

        $query = CatalogAction::with(['user', 'lemari']);

        // Filter berdasarkan waktu jika ada
        if ($request->filled('start_date') && $request->filled('end_date')) {
            // Menambahkan waktu ke start_date dan end_date
            $startDate = \Carbon\Carbon::parse($request->start_date)->startOfDay();
            $endDate = \Carbon\Carbon::parse($request->end_date)->endOfDay();

            // Filter berdasarkan tanggal yang sudah diubah
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Filter berdasarkan unit kerja
        if ($request->filled('unit_kerja')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('unit_kerja', 'like', '%' . $request->unit_kerja . '%');
            });
        }

        $actions = $query->orderBy('created_at', 'desc')->simplePaginate(10);



        return view('Admin/loglemari', compact('actions'), ['title' => 'Halaman Log Lemari',]);
    }

    // kontrol kondisi alat
    public function kondisialat(Request $request)
    {
        // Ambil nilai pencarian kondisi_alat dari request
        $conditionFilter = $request->input('condition');

        // Query data catalog dengan filter kondisi_alat
        $catalogs = Catalog::with('lemari')
            ->when($conditionFilter, function ($query, $conditionFilter) {
                $query->where('kondisi_alat', $conditionFilter);
            })
            ->orderBy('updated_at', 'desc')
            ->simplePaginate(10);

        return view('Admin/kondisialat', compact('catalogs'), ['title' => 'Halaman kontrol Alat Kerja',]);
    }
}
