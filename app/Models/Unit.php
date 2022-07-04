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

    public function aset() {
        return $this->hasMany(DataAset::class);
    }

    public function peminjaman() {
        return $this->hasMany(Peminjaman::class);
    }

    public function pemusnahan() {
        return $this->hasMany(Pemusnahan::class);
    }

    public function pengadaan() {
        return $this->hasMany(Pengadaan::class);
    }

    public function monitoring() {
        return $this->hasMany(Monitoring::class);
    }

}
