@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Manajemen Berita & Artikel</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 border border-green-300 rounded-md p-4 mb-4 shadow-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gradient-to-br from-purple-200 to-purple-300 shadow-lg rounded-lg overflow-hidden mb-6">
            <div class="px-6 py-4 bg-purple-400 flex justify-between items-center rounded-t-lg shadow-inner">
                <h5 class="text-xl font-semibold text-gray-800">Daftar Berita & Artikel</h5>
                <a href="{{ route('berita.create') }}"
                    class="inline-flex items-center bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-semibold py-2 px-4 rounded-lg shadow-md transition-all transform hover:scale-105">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 12h18m-9 9h9">
                        </path>
                    </svg>
                    Tambah Berita/Artikel
                </a>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($berita as $item)
                    <div
                        class="bg-white shadow-lg rounded-xl overflow-hidden transform hover:shadow-2xl transition-all duration-300">
                        <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $item->cover) }}"
                            alt="{{ $item->judul }}">
                        <div class="p-4 bg-gray-100">
                            <h5 class="text-xl font-semibold text-gray-800">{{ $item->judul }}</h5>
                            <p class="text-gray-600 mt-2"><strong>Penulis:</strong> {{ $item->penulis }}</p>
                            <div class="flex space-x-2 mt-4">
                                <a href="{{ route('berita.show', $item->slug) }}"
                                    class="flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md transition-all transform hover:scale-105">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3"></path>
                                    </svg>
                                    Detail
                                </a>
                                <a href="{{ route('berita.edit', $item->slug) }}"
                                    class="flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-md transition-all transform hover:scale-105">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232a1 1 0 00-1.415 0L7.758 11.585 6 15l3.414-1.758 6.06-6.06a1 1 0 000-1.415z">
                                        </path>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('berita.destroy', $item->slug) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow-md transition-all transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
