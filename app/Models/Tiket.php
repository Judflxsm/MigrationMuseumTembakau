<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tikets';
    protected $primaryKey = 'tiket_id';

    protected $fillable = [
        'admin_id',
        'tipe_tiket',
        'harga',
        'deskripsi',
        'jumlah_maksimal_pengunjung',
        'tanggal_kadaluarsa',
        'reserved_tickets',
        'tanggal_pemesanan',
    ];
    

    // Relasi
    // Model Tiket.php
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id'); // Sesuaikan 'admin_id' dengan nama kolom foreign key di database.
    }

}
