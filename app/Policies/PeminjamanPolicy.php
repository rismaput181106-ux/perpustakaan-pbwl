<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Peminjaman;

class PeminjamanPolicy
{
    // Admin & Petugas bebas lihat semua
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'petugas']);
    }

    // Aturan utama buat IDOR: Siswa cuma boleh lihat miliknya sendiri
    public function view(User $user, Peminjaman $peminjaman): bool
    {
        // Admin & Petugas boleh lihat punya siapa aja
        if ($user->hasAnyRole(['admin', 'petugas'])) {
            return true;
        }

        // Siswa: cek apakah email dia sama dengan email si peminjam (anggota)
        return $peminjaman->anggota && $user->email === $peminjaman->anggota->email;
    }
}