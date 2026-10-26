<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    // Nama tabel di database
    protected $table = 'table_buku';

    // Kolom yang bisa diisi
    protected $fillable = [
        'judul',
        'penulis'
    ];

    public $timestamps = true;
}