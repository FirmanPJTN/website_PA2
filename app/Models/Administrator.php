<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    use HasFactory;

    protected $table = 'administrators';
    
    protected $fillable = ['nama', 'unit', 'email', 'password'];

    protected $primaryKey = 'id';


    public function DataAset() {
        return $this->belongsTo(DataAset::class, 'id')
    }

    public function Peminjaman() {
        return $this->belongsTo(Peminjaman::class, 'id')
    }

    public function Pengadaan() {
        return $this->belongsTo(Pengadaan::class, 'id')
    }
}
