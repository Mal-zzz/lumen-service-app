<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // protected $table = 'students';

    // Colom yang bisa diisi
    protected $fillable = ['nim', 'name'];

    // menambahkan created_at dan update_at otomatis
    public $timestamps = true;
}
