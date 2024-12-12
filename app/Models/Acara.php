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
        'admin_id',
        'nama_acara',
        'tanggal_mulai_acara',
        'tanggal_selesai_acara',
        'deskripsi',
        'status',
        'gambar_banner',
    ];

    // Relasi
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'admin_id');
    }
}

