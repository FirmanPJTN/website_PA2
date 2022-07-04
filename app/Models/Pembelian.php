<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $guarded = ['id'];

    public function pengadaan() {
        return $this->belongsTo(Pengadaan::class,'pengadaan_id');
    }
}
