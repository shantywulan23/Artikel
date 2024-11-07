@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-8">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Tambah Berita/ Artikel</h2>

        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" id="judul"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>
            </div>

            <div>
                <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                <input type="text" name="penulis" id="penulis"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>
            </div>

            <div>
                <label for="caption" class="block text-sm font-medium text-gray-700">Caption</label>
                <textarea name="caption" id="caption"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
            </div>

            <div>
                <label for="cover" class="block text-sm font-medium text-gray-700">Cover</label>
                <input type="file" name="cover" id="cover"
                    class="mt-1 block w-full text-gray-900 bg-gray-50 rounded-md border border-gray-300 cursor-pointer focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-4 focus:ring-indigo-500 mt-4">
                    Simpan
                </button>
                <a href="{{ route('berita.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-white hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-4 focus:ring-gray-500 mt-4 ml-2">
                    Batal
                </a>

            </div>
        </form>
    </div>
@endsection
