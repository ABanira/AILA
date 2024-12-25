<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    function index()
    {
        return view('Admin/index', ['title' => 'Halaman Admin']);
    }

    function viewuser($id)
    {
        $user = User::findOrFail($id);
        return view('Admin/viewuser', compact('user'), ['title' => 'Halaman Rincian Pengguna',]);
    }

    function user()
    {
        $users = User::paginate(5);
        return view('Admin/usermanage', compact('users'), ['title' => 'Halaman List Pengguna']);
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

    //list Lemari Alat
    function loker()
    {
        return view('Admin/usermanage', ['title' => 'Halaman List Pengguna']);
    }
}
