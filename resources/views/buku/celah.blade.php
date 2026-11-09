<x-app-layout>
    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-4">Daftar Buku (Celah A1)</h2>
        
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border p-2">Judul</th>
                    <th class="border p-2">Penulis</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bukus as $buku)
                <tr>
                    <td class="border p-2">{{ $buku->judul }}</td>
                    <td class="border p-2">{{ $buku->penulis }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>