<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAset extends Model
{
    use HasFactory;
    protected $table = 'data_asets';
    
    protected $fillable = ['kodeAset', 'kategori', 'jenisBarang','tipeBarang','jumlahBarang','tglBeli','penyimpanan', 'unit', 'isInternal'];

    protected $primaryKey = 'id';

    public function User() {
        return $this->hasMany(User::class);
    }

}
