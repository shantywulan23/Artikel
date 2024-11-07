<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // Menampilkan 6 berita terbaru di halaman welcome
    public function welcome()
    {
        $berita = Berita::latest()->take(6)->get();
        return view('welcome', compact('berita'));

    }

    // Menampilkan daftar berita di halaman index
    public function index()
    {
        $berita = Berita::all();
        return view('berita.index', compact('berita'));
    }
    public function create()
{
    return view('berita.create'); // Menampilkan halaman form create
}

    // Menyimpan berita baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'caption' => 'nullable|string',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Membuat berita baru
        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->penulis = $request->penulis;
        $berita->caption = $request->caption;

        // Membuat slug unik untuk berita
        $slug = Str::slug($request->judul);
        $count = Berita::where('slug', $slug)->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $berita->slug = $slug;

        // Menyimpan cover jika ada file gambar
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
            $berita->cover = $coverPath;
        }

        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    // Menampilkan detail berita berdasarkan slug
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('berita.show', compact('berita'));
    }

    // Menampilkan form edit berita berdasarkan slug
    public function edit($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('berita.edit', compact('berita'));
    }

    // Memperbarui data berita berdasarkan slug
    public function update(Request $request, $slug)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'caption' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Mencari berita berdasarkan slug
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $berita->judul = $request->judul;
        $berita->penulis = $request->penulis;
        $berita->caption = $request->caption;

        // Upload cover baru jika ada
        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($berita->cover) {
                Storage::delete($berita->cover);
            }
            // Menyimpan cover baru
            $coverPath = $request->file('cover')->store('covers', 'public');
            $berita->cover = $coverPath;
        }

        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    // Menghapus berita berdasarkan slug
    public function destroy($slug)
    {
        // Mencari berita berdasarkan slug
        $berita = Berita::where('slug', $slug)->firstOrFail();

        // Menghapus cover jika ada
        if ($berita->cover) {
            Storage::delete($berita->cover);
        }

        // Menghapus berita dari database
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus');
    }
}
