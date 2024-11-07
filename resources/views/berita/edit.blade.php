@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-8">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Edit Berita/Artikel</h2>
        <h5 class="text-lg text-gray-600 mb-6">Edit Berita: {{ $berita->judul }}</h5>

        <form action="{{ route('berita.update', $berita->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" id="judul" name="judul"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    value="{{ $berita->judul }}" required>
            </div>

            <div class="mb-4">
                <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                <input type="text" id="penulis" name="penulis"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    value="{{ $berita->penulis }}" required>
            </div>

            <div class="mb-4">
                <label for="caption" class="block text-sm font-medium text-gray-700">Caption</label>
                <textarea id="caption" name="caption" rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $berita->caption }}</textarea>
            </div>

            <div class="mb-4">
                <label for="cover" class="block text-sm font-medium text-gray-700">Cover (optional)</label>
                <input type="file" id="cover" name="cover"
                    class="mt-1 block w-full text-gray-900 bg-gray-50 rounded-md border border-gray-300 cursor-pointer focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <small class="text-gray-500">Kosongkan jika tidak ingin mengganti cover.</small>
            </div>

            <div class="flex justify-end space-x-4">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update
                </button>
                <a href="{{ route('berita.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-white hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
