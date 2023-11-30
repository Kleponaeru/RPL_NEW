<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengambilSampah extends Model
{
    protected $table = 'orders_pengambil';
    protected $fillable = [
        // 'id_user',
        // 'id_location',
        'kg_sampah',
        'jam',
        'status',
        'jns_smph',
    ];
}
