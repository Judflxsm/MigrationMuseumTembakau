@extends('admin.index')

@section('title', 'Koleksi Museum')
@section('content')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<main class="my-8">
    <div class="container mx-auto px-6">
        <h3 class="text-gray-600 text-2xl font-medium">Koleksi Museum</h3>
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-5 mb-5"
            onclick="document.getElementById('addKoleksi').classList.remove('hidden')">
            Tambah koleksi
        </button>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @if ($koleksis->isEmpty())
            <p>Tidak ada koleksi yang tersedia saat ini.</p>
            @else
                @foreach ($koleksis as $koleksi)
                <div class="w-full max-w-sm mx-auto rounded-lg shadow-md overflow-hidden bg-white relative">
                    <!-- Bagian Gambar --> 
                    <div class="relative h-56 w-full">
                        <div class="absolute inset-0 bg-cover bg-center" 
                            style="background-image: url('{{ asset('storage/' . $koleksi->gambar) }}');">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 z-10 flex space-x-2">
                        <!-- Tombol Edit -->
                        <button class="p-2 rounded bg-blue-600 text-white shadow-lg hover:bg-blue-500 focus:outline-none"
                            onclick="openEditKoleksi({{ json_encode($koleksi) }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 3.487l3.656 3.656m-2.121-2.121L7.5 17.94v3.535h3.535l10.293-10.293a1.5 1.5 0 000-2.121l-3.656-3.656a1.5 1.5 0 00-2.121 0z"></path>
                            </svg>
                        </button>
                        <!-- Tombol Delete --> 
                        <form action="{{ route('admin.koleksi.destroy', $koleksi->koleksi_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus koleksi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 rounded bg-red-600 text-white shadow-lg hover:bg-red-500 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                    <!-- Detail koleksi -->
                    <div class="px-5 py-4">
                        <h3 class="text-gray-700 uppercase font-semibold text-lg">{{ $koleksi->judul}}</h3>
                        <p class="text-gray-500 text-sm mt-1">{{ $koleksi->deskripsi_singkat}}</p>
                        <a href="{{ route('koleksi.detail', $koleksi->koleksi_id) }}" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
                    </div>
                </div>                    
                @endforeach
            @endif
        </div>
    </div>
</main>

{{-- Pop up tambah koleksi --}}
<div id="addKoleksi" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded shadow-md w-96 relative overflow-hidden">
        <h2 class="text-lg font-bold mb-4">Tambah Koleksi</h2>
        <form action="{{ route('admin.koleksi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="judul" class="block text-sm">Nama Koleksi</label>
                <input type="text" id="judul" name="judul" class="border p-2 w-full rounded">
            </div>
            <div class="mb-4">
                <label for="deskripsi_singkat" class="block text-sm">Deskripsi Singkat Koleksi</label>
                <textarea id="deskripsi_singkat" name="deskripsi_singkat" class="border p-2 w-full rounded"></textarea>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm">Deskripsi Koleksi</label>
                <textarea id="deskripsi" name="deskripsi" class="border p-2 w-full rounded"></textarea>
            </div>
            <div class="mb-4">
                <label for="gambar" class="block text-sm">Gambar Produk</label>
                <input type="file" id="gambar" name="gambar" class="border p-2 w-full rounded">
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" class="px-4 py-2 bg-gray-300 rounded"
                    onclick="document.getElementById('addKoleksi').classList.add('hidden')">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Pop up edit koleksi --}} 
<div id="editKoleksi" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded shadow-md w-96 relative overflow-hidden">
        <h2 class="text-lg font-bold mb-4">Edit Koleksi</h2>
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="edit_judul" class="block text-sm">Nama Koleksi</label>
                <input type="text" id="edit_judul" name="judul" class="border p-2 w-full rounded">
            </div>
            <div class="mb-4">
                <label for="edit_deskripsi_singkat" class="block text-sm">Deskripsi Singkat Koleksi</label>
                <textarea id="edit_deskripsi_singkat" name="deskripsi_singkat" class="border p-2 w-full rounded"></textarea>
            </div>
            <div class="mb-4">
                <label for="edit_deskripsi" class="block text-sm">Deskripsi Koleksi</label>
                <textarea id="edit_deskripsi" name="deskripsi" class="border p-2 w-full rounded"></textarea>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" class="px-4 py-2 bg-gray-300 rounded"
                    onclick="document.getElementById('editKoleksi').classList.add('hidden')">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditKoleksi(koleksi) {
    const editForm = document.getElementById('editForm');
        editForm.action = `/admin/koleksi/${koleksi.koleksi_id}`;

        document.getElementById('edit_judul').value = koleksi.judul;
        document.getElementById('edit_deskripsi').value = koleksi.deskripsi;
        document.getElementById('edit_deskripsi_singkat').value = koleksi.deskripsi_singkat;

        document.getElementById('editKoleksi').classList.remove('hidden');
}
</script>

@endsection 
