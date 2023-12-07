<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSampah extends Model
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
    ];
}
