<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utang extends Model
{
    protected $fillable = ['pelanggan_id', 'keterangan', 'jumlah', 'jatuh_tempo', 'status'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
