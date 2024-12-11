<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    protected $fillable = [
        'admin_id', // pastikan admin_id ada di sini
        'judul',
        'deskripsi',
        'gambar',
    ];

    // Relasi ke model Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'admin_id'); // pastikan 'admin_id' sebagai foreign key
    }

}

