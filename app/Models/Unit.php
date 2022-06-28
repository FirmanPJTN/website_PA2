<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'unit';
    
    protected $guarded = ['id'];

    public function user() {
        return $this->hasMany(User::class);
    }

    public function dataaset() {
        return $this->belongsTo(DataAset::class);
    }

    public function notifikasi() {
        return $this->belongsTo(Notifikasi::class);
    }

    public function pembelian() {
        return $this->belongsTo(Pembelian::class);
    }

    public function peminjaman() {
        return $this->belongsTo(Peminjaman::class);
    }

    public function pemusnahan() {
        return $this->belongsTo(Pemusnahan::class);
    }

    public function pengadaan() {
        return $this->belongsTo(Pengadaan::class);
    }

    public function monitoring() {
        return $this->belongsTo(Monitoring::class);
    }

}
