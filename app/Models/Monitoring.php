<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;

    protected $table = 'monitoring';
    
    protected $guarded = [];

    public $incrementing = false; 

    protected $primaryKey = 'kodeMonitoring';

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
