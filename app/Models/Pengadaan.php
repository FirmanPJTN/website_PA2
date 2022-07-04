<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;

    protected $table = 'pengadaan';
    
    protected $guarded = [];

    protected $primaryKey = 'kodePengadaan';

    public $incrementing = false; 

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function unit() {
        return $this->belongsTo(Unit::class,'unit_id');
    }

    public function aset() {
        return $this->belongsTo(DataAset::class,'aset_id');
    }

    public function notifikasi() {
        return $this->hasMany(Notifikasi::class);
    }

}
