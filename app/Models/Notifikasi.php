<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';
    
    protected $fillable = ['deskripsi','user_id','aset_id','peminjaman_id','pengadaan_id','unit_id','status', 'unit','kodeMonitoring','kodePemusnahan','kodePeminjaman','role'];
}
