<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $guarded = ['id'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
