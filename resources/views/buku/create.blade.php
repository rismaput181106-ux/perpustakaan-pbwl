<x-app-layout>
    <div class="py-10 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow-sm">
            <h2 class="text-2xl font-bold mb-4">Tambah Buku Baru</h2>
            
            <form action="{{ route('buku.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" class="w-full border p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="w-full border p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label>Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="w-full border p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label>Kategori ID</label>
                    <input type="number" name="kategori_id" class="w-full border p-2 rounded" required>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </form>
        </div>
    </div>
</x-app-layout>