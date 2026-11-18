<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500;600&display=swap');
        
        .container { font-family: 'Inter', sans-serif; max-width: 1000px; margin: 0 auto; padding: 20px; }
        .page-title { text-align: center; margin-bottom: 5px; font-family: 'Playfair Display', serif; font-size: 2.2rem; color: #2c3e50; }
        .page-subtitle { text-align: center; color: #7f8c8d; margin-bottom: 30px; font-size: 0.9rem; }
        
        .btn { padding: 12px 24px; border-radius: 8px; font-size: 0.9rem; font-weight: 600; cursor: pointer; border: none; transition: all 0.3s; font-family: 'Inter', sans-serif; }
        .btn-primary { background: #4a6fa5; color: white; box-shadow: 0 4px 10px rgba(74, 111, 165, 0.2); text-decoration: none; display: inline-block; }
        .btn-primary:hover { background: #385887; transform: translateY(-2px); }
        
        .table-custom { width: 100%; border-collapse: separate; border-spacing: 0; background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: 1px solid #f0f0f0; }
        .table-custom th { background: #2c3e50; color: #ffffff; padding: 18px 15px; text-align: left; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }
        .table-custom td { padding: 16px 15px; border-bottom: 1px solid #f0f0f0; font-size: 0.9rem; color: #333; }
        .table-custom tr:last-child td { border-bottom: none; }
        .table-custom tr:hover td { background: #f8fbfa; }
        
        .btn-sm { padding: 8px 16px; font-size: 0.75rem; border-radius: 6px; font-weight: 600; }
        .btn-danger { background: transparent; border: 1.5px solid #e74c3c; color: #e74c3c; cursor: pointer;}
        .btn-danger:hover { background: #e74c3c; color: white; }
        
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem; }
        .text-blue-600 { color: #4a6fa5; text-decoration: none; font-weight: 600;}
        .text-blue-600:hover { text-decoration: underline; }
    </style>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @can('kelola-buku')
            <div class="mb-4" style="margin-bottom: 20px;">
                <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku Baru</a>
            </div>
        @endcan

        <h2 class="page-title">Data Buku</h2>
        <p class="page-subtitle">Daftar koleksi buku perpustakaan digital.</p>
        
        <table class="table-custom">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($buku as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->kategori->nama ?? '-' }}</td>
                    <td>
                        <a href="{{ route('buku.show', $item->id) }}" class="text-blue-600">
                            {{ $item->judul }}
                        </a>
                    </td>
                    <td>{{ $item->penulis }}</td>
                    <td>{{ $item->tahun_terbit }}</td>
                    <td>
                        @can('kelola-buku')
                            <form action="{{ route('buku.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>