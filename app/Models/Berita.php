<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    // Jika Anda ingin menentukan nama tabel secara eksplisit, Anda dapat menggunakan:
    protected $table = 'berita';

    // Jika kolom `created_at` dan `updated_at` tidak digunakan, setel ini menjadi false:
    public $timestamps = true;

    // Jika Anda ingin mengizinkan mass-assignment pada kolom tertentu, definisikan `$fillable`:
    protected $fillable = [
        'slug',
        'judul',
        'penulis',
        'caption',
        'cover',
    ];

    // Jika Anda ingin menggunakan `$guarded` untuk melindungi kolom tertentu dari mass-assignment:
    // protected $guarded = ['id']; // Ini akan melindungi kolom `id` dari mass-assignment.
}
