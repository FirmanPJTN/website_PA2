<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;

    protected $table = 'pengadaan';
    
    protected $fillable = ['jenisBarang1','tipeBarang1','jumlahBarang1','jenisBarang2','tipeBarang2','jumlahBarang2','jenisBarang3','tipeBarang3','jumlahBarang3','jenisBarang4','tipeBarang4','jumlahBarang4','jenisBarang5','tipeBarang5','jumlahBarang5','alasan','user_id', 'status'];

    public function User() {
        return $this->belongsTo(User::class, 'id');
    }

}
