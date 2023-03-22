<?php

namespace App\Models;

use App\Models\Kendaraan;
use App\Enums\TipeKendaraan;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mobil extends Kendaraan
{
    use HasFactory;
    
    function __construct(array $attributes = array())
    {
        $attributes['tipe kendaraan'] = TipeKendaraan::MOBIL;

        $this->mergeFillable([
            "mesin",
            "kapasitas penumpang",
            "tipe",
            "tipe kendaraan",
        ]);

        $this->mergeCasts([
            'mesin' => 'string',
            'kapasitas penumpang' => 'int',
            'tipe' => 'string',
            'tipe kendaraan' => 'int',
        ]);

        parent::__construct($attributes);
    }
}
