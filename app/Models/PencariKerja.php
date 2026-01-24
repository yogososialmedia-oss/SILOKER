<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PencariKerja extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'tb_pencari_kerja';
    protected $fillable = [
        'nama_pencari_kerja',
        'alamat_pencari_kerja',
        'no_telp_pencari_kerja',
        'email_pencari_kerja',
        'password_pencari_kerja',
        'cv',
        'nim',
        'foto_pencari_kerja',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password_pencari_kerja',
    ];
    
}
