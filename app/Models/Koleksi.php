<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    protected $table = 'koleksis';
    protected $primaryKey = 'koleksi_id';
    protected $fillable = [
        'judul',
        'deskripsi_singkat',
        'deskripsi',
        'gambar',
    ];

    // Relasi ke model Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'admin_id'); // pastikan 'admin_id' sebagai foreign key
    }

}

