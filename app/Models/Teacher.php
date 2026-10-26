<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    // protected $table = 'teachers';

    // Colom yang bisa diisi
    protected $fillable = ['nip', 'name'];

    // menambahkan created_at dan update_at otomatis
    public $timestamps = true;
}
