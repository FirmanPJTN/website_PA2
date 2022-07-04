<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAset extends Model
{
    use HasFactory;
    
    protected $table = 'data_asets';
    
    protected $primaryKey = 'kodeAset';

    public $incrementing = false;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function unit() {
        return $this->belongsTo(Unit::class);
    }

    public function gedung() {
        return $this->belongsTo(Gedung::class);
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }

    public function peminjaman() {
        return $this->hasMany(Peminjaman::class);
    }

    public function pengadaan() {
        return $this->hasMany(Pengadaan::class);
    }

    public function monitoring() {
        return $this->hasMany(Monitoring::class);
    }

    public function pemusnahan() {
        return $this->hasMany(Pemusnahan::class);
    }

}
