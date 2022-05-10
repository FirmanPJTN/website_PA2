<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';

    protected $fillable = ['nama', 'unit', 'email', 'password', 'role'];

    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function DataAset() {
        return $this->belongsTo(DataAset::class, 'id');
    }

    public function Peminjaman() {
        return $this->belongsTo(Peminjaman::class, 'id');
    }

    public function Pengadaan() {
        return $this->belongsTo(Pengadaan::class, 'id');
    }

    public function Pembelian() {
        return $this->belongsTo(Pembelian::class, 'id');
    }

   
}
