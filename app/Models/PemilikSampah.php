<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilikSampah extends Model
{
    protected $table = 'orders';
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