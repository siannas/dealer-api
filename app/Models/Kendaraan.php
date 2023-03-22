<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Kendaraan extends Model
{
    protected $collection = 'kendaraans';

    public $timestamps = false;

    protected $attributes = [
        'terjual' => null, //new \DateTime()->format('c'),
    ];

    protected $casts = [
        'terjual' => 'datetime',
        "warna" => 'string', 
        "harga" => 'string',
    ];

    protected $fillable = [
        "tahun keluaran", 
        "warna", 
        "harga",
        "terjual",          // null || datetime
    ];
}
