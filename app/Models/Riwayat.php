<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $table = 'riwayat_pesanan';
    protected $fillable = [
        // 'id_user',
        'id_location',
        'kg_sampah',
        'jam',
        'status',
        'pengambilan',
        'jns_smph',
        'harga',
    ];
    public function location()
    {
        return $this->belongsTo(Location::class, 'id_location', 'id_location');
    }
}
