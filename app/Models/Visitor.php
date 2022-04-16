<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $table = 'visitors';
    
    protected $fillable = ['nama', 'unit', 'email', 'password'];

    protected $primaryKey = 'id';


    public function DataAset() {
        return $this->belongsTo(DataAset::class, 'id')
    }

    public function Peminjaman() {
        return $this->belongsTo(Peminjaman::class, 'id')
    }
}
