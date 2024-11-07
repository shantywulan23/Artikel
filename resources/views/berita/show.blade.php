@extends('layouts.app')

@section('content')
    <div class="container mt-8">
        <h1 class="mb-6 text-center text-3xl font-bold text-gray-800">Detail Berita</h1>
        <div class="flex justify-center">
            <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-8">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img class="w-full h-auto object-cover" src="{{ asset('storage/' . $berita->cover) }}"
                        alt="{{ $berita->judul }}">
                    <div class="p-6">
                        <h4 class="text-2xl font-semibold text-gray-800 text-center mb-2">{{ $berita->judul }}</h4>
                        <p class="text-gray-600 text-left mb-4">{{ $berita->caption }}</p>
                        <p class="text-sm text-gray-500 text-center mb-4">Diterbitkan oleh
                            <strong>{{ $berita->penulis }}</strong>
                        </p>
                        <div class="flex justify-center">
                            <a href="{{ route('dashboard') }}"
                                class="inline-flex items-center px-5 py-3 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
