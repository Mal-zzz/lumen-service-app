<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    // protected $table = 'stocks';

    // Colom yang bisa diisi
    protected $fillable = ['product_id', 'quantity'];

    // menambahkan created_at dan update_at otomatis
    public $timestamps = true;
}
