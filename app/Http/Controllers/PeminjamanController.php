<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PeminjamanController extends Controller
{
    public function showCelah($id)
    {
        // Cari data dulu
        $peminjaman = Peminjaman::with(['buku', 'anggota'])->findOrFail($id);

        // CEK POLICY: Kalau nggak berhak, langsung 403
        Gate::authorize('view', $peminjaman);
        
        return response()->json([
            'message' => 'Detail Peminjaman (Sudah Diamankan)',
            'data' => $peminjaman
        ]);
    }
}