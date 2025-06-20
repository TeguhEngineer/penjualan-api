<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $guarded = ['id'];

    public function detail()
    {
        return $this->hasMany(TransaksiDetail::class);
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }
}
