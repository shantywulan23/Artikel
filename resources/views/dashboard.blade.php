@extends('layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-3xl font-bold text-center mb-6">Artikel & Berita Teerbaru</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($berita as $item)
                <div
                    class="bg-white shadow-lg rounded-xl overflow-hidden transform hover:shadow-2xl transition-all duration-300">
                    <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $item->cover) }}"
                        alt="{{ $item->judul }}">
                    <div class="p-4 bg-gray-100">
                        <h5 class="text-xl font-semibold text-gray-800">{{ $item->judul }}</h5>
                        <p class="text-gray-600 mt-2"><strong>Penulis:</strong> {{ $item->penulis }}</p>
                        <div class="flex justify-center mt-4">
                            <a href="{{ route('berita.show', $item->slug) }}"
                                class="flex items-left px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md transition-all transform hover:scale-105">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3">
                                    </path>
                                </svg>
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
