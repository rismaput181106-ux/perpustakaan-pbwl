<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PeminjamanController extends Controller
{
    // Method ini untuk yang SUDAH DIPERBAIKI (Aman dari IDOR)
    public function show($id)
    {
        $peminjaman = Peminjaman::with(['buku', 'anggota'])->findOrFail($id);
        
        // INI KUNCINYA: Pakai policy untuk ngecek hak akses
        Gate::authorize('view', $peminjaman);

        // Tampilkan view atau JSON (buat ngetes)
        return response()->json([
            'message' => 'Detail Peminjaman (Aman)',
            'data' => $peminjaman
        ]);
        
        // Catatan: Kalau nanti butuh tampilan web, ganti baris return di atas jadi:
        // return view('peminjaman.show', compact('peminjaman'));
    }

    // Method ini biarin aja buat BUKTI LAPORAN (Celah IDOR)
    // Jangan dipakai di route utama, ini cuma buat screenshot Modul 6
    public function showCelah($id)
    {
        $peminjaman = Peminjaman::with(['buku', 'anggota'])->findOrFail($id);
        
        // Sengaja TIDAK pakai Gate::authorize biar rentan
        return response()->json([
            'message' => 'Detail Peminjaman (Rentan IDOR)',
            'data' => $peminjaman
        ]);
    }
}