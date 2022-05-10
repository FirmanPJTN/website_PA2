<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $fillable = ['gambar','jenisBarang1','tipeBarang1','jumlahBarang1','jenisBarang2','tipeBarang2','jumlahBarang2','jenisBarang3','tipeBarang3','jumlahBarang3','jenisBarang4','tipeBarang4','jumlahBarang4','jenisBarang5','tipeBarang5','jumlahBarang5','waktuPembelian','deskripsi','deskripsi2', 'status','role','user_id','pengadaan_id','alasan', 'dokumenPO', 'dokumenPR'];

    public function User() {
        return $this->belongsTo(User::class, 'id');
    }
}
