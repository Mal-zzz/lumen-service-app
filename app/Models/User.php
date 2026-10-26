<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // protected $table = 'users';

    // Colom yang bisa diisi
    protected $fillable = ['name', 'email'];

    // menambahkan created_at dan update_at otomatis
    public $timestamps = true;
}
