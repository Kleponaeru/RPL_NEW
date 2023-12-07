<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = [
        // 'id_user',
        'id_location',
        'nama_location',
        'longtitude',
        'latitude',
    ];
}
