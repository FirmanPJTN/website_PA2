<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactor extends Model
{
    use HasFactory;

    protected $table = 'transactors';
    
    protected $fillable = ['nama', 'unit', 'email', 'password'];

    protected $primaryKey = 'id';


    public function DataAset() {
        return $this->belongsTo(DataAset::class, 'id')
    }
}
