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

    protected $guarded = ['id'];


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

    public function dataaset() {
        return $this->belongsTo(DataAset::class);
    }

    public function notifikasi() {
        return $this->belongsTo(Notifikasi::class);
    }

    public function pembelian() {
        return $this->belongsTo(Pembelian::class);
    }

    public function peminjaman() {
        return $this->belongsTo(Peminjaman::class);
    }

    public function pemusnahan() {
        return $this->belongsTo(Pemusnahan::class);
    }

    public function pengadaan() {
        return $this->belongsTo(Pengadaan::class);
    }

    public function unit() {
        return $this->belongsTo(Unit::class);
    }

    public function monitoring() {
        return $this->belongsTo(Monitoring::class);
    }
}
