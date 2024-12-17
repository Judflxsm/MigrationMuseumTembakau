<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;

    protected $table = 'acaras';
    protected $primaryKey = 'acara_id';

    protected $fillable = [
        'nama_acara',
        'tanggal_acara',
        'deskripsi_singkat',
        'deskripsi',
        'gambar',
        'google_map_url'
    ];

    // Relasi 
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'admin_id');
    }
}

