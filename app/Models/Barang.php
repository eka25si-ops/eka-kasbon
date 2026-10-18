<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['nama', 'kategori', 'harga_eceran', 'harga_grosir', 'stok'];
}