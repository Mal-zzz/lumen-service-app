<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perpustakaan extends Model
{
    // Nama tabel di database
    protected $table = 'table_perpustakaan';

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama'
    ];

    public $timestamps = true;
}
