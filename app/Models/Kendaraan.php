<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Kendaraan extends Model
{
    protected $collection = 'kendaraans';

    public $timestamps = false;

    protected $fillable = [
        "tahun keluaran", 
        "warna", 
        "harga",
        "terjual",          // null || datetime
    ];
}
