<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;

    protected $table = 'monitoring';
    
    protected $fillable = ['kodeMonitoring','jenisBarang1','tipeBarang1','jumlahBarang1','gambarBarang1','jenisBarang2','tipeBarang2','jumlahBarang2','gambarBarang2','jenisBarang3','tipeBarang3','jumlahBarang3','gambarBarang3','jenisBarang4','tipeBarang4','jumlahBarang4','gambarBarang4','jenisBarang5','tipeBarang5','jumlahBarang5','gambarBarang5','waktuMonitoring','deskripsi', 'status','unit'];

    public function User() {
        return $this->belongsTo(User::class, 'id');
    }
}
