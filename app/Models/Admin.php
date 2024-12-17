<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';
    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'username',
        'password',
    ];

    // Relasi
    public function infoMuseum()
    {
        return $this->hasOne(InfoMuseum::class, 'admin_id', 'admin_id');
    }

    public function koleksi()
    {
        return $this->hasMany(Koleksi::class, 'admin_id', 'admin_id');
    }

    public function acara()
    {
        return $this->hasMany(Acara::class, 'admin_id', 'admin_id');
    }
}

