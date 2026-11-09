<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function showCelah($id)
    {
        $peminjaman = Peminjaman::with(['buku', 'anggota'])->findOrFail($id);
        
        return response()->json([
            'message' => 'Detail Peminjaman (Celah IDOR)',
            'data' => $peminjaman
        ]);
    }
}