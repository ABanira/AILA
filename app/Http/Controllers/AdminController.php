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

    //list Pengguna
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
            'password' => 'required|string|min:8',
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
            $user->id_img = $request->nipp . '/' . $filename;
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

    //list Lemari Alat
    function loker()
    {
        return view('Admin/usermanage', ['title' => 'Halaman List Pengguna']);
    }
}
