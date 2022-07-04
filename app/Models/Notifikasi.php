<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';
    
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function unit() {
        return $this->belongsTo(Unit::class);
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
