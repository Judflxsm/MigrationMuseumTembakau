<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoMuseum extends Model
{
    use HasFactory;
    // Relasi
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'admin_id');
    }
}

