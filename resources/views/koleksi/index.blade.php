@extends('layouts.app')

@section('title', 'Koleksi Museum')

@section('content')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <main class="my-8">
        <h3 class="text-gray-600 text-2xl font-medium mb-4">Koleksi Museum</h3>
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @if ($koleksis->isEmpty())
                    <p class="text-gray-500">Tidak ada koleksi yang tersedia saat ini.</p>
                @else
                    @foreach ($koleksis as $koleksi)
                    <div class="w-full max-w-sm mx-auto rounded-lg shadow-md overflow-hidden bg-white relative">
                        <!-- Bagian Gambar -->
                        <div class="relative h-56 w-full">
                            <div class="absolute inset-0 bg-cover bg-center" 
                                style="background-image: url('{{ asset('storage/' . $koleksi->gambar) }}');">
                            </div>
                        </div>
                        <!-- Detail koleksi --> 
                        <div class="px-5 py-4">
                            <h3 class="text-gray-700 uppercase font-semibold text-lg">{{ $koleksi->judul}}</h3>
                            <p class="text-gray-500 text-sm mt-1">{{ $koleksi->deskripsi_singkat }}</p>
                            <a href="{{ route('koleksi.detail', $koleksi->koleksi_id) }}" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </main>
@endsection
