<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approver extends Model
{
    use HasFactory;

    protected $table = 'approvers';
    
    protected $fillable = ['nama', 'unit', 'email', 'password'];

    protected $primaryKey = 'id';


    public function DataAset() {
        return $this->belongsTo(DataAset::class, 'id')
    }
}
