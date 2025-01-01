<?php

namespace App\Http\Controllers;

use App\Models\Lemari;
use Illuminate\Http\Request;

class LemariController extends Controller
{
    // Fungsi untuk mendapatkan data lemari berdasarkan IP
    public function getLemariByIP(Request $request)
    {
        // Mengambil data berdasarkan ip_control
        $lemari = Lemari::where('ip_control', $request->ip_control)->first();

        if ($lemari) {
            return response()->json([
                'status' => 'success',
                'data' => $lemari
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Lemari dengan IP kontrol tersebut tidak ditemukan'
            ]);
        }
    }

    // Fungsi untuk memperbarui status laci
    public function updateLaciStatus(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'ip_control' => 'required|string',
            'laci_1' => 'nullable|boolean',
            'laci_2' => 'nullable|boolean',
            'laci_3' => 'nullable|boolean',
            'laci_4' => 'nullable|boolean',
        ]);

        // Mencari lemari berdasarkan ip_control
        $lemari = Lemari::where('ip_control', $request->ip_control)->first();

        if ($lemari) {
            // Update status untuk masing-masing laci
            if ($request->has('laci_1')) {
                $lemari->laci_1 = $request->laci_1;
            }
            if ($request->has('laci_2')) {
                $lemari->laci_2 = $request->laci_2;
            }
            if ($request->has('laci_3')) {
                $lemari->laci_3 = $request->laci_3;
            }
            if ($request->has('laci_4')) {
                $lemari->laci_4 = $request->laci_4;
            }

            // Simpan perubahan
            $lemari->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Status laci berhasil diperbarui',
                'data' => $lemari
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Lemari dengan IP kontrol tersebut tidak ditemukan'
            ]);
        }
    }
}
