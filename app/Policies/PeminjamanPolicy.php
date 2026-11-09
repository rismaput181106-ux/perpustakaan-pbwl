<?php

namespace App\Policies;

use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PeminjamanPolicy
{
    /**
     * Tentukan apakah user boleh melihat data peminjaman.
     */
    public function view(User $user, Peminjaman $peminjaman): bool
    {
        // Admin & Petugas boleh lihat semua
        if ($user->hasAnyRole(['admin', 'petugas'])) {
            return true;
        }

        // Siswa HANYA boleh lihat miliknya sendiri (cek berdasarkan email anggota)
        return $user->email === $peminjaman->anggota->email;
    }
}