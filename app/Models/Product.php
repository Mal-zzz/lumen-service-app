<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table = 'products';

    // Colom yang bisa diisi
    protected $fillable = array('name', 'price');

    // menambahkan created_at dan update_at otomatis
    // public $timestamps = true;
}
