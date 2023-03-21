<?php

namespace App\Models;

use App\Models\Kendaraan;
use App\Enums\TipeKendaraan;

class Mobil extends Kendaraan
{
    function __construct(array $attributes = array())
    {
        $this->attributes = array_merge($attributes, [
            'tipe kendaraan' => TipeKendaraan::MOBIL,
        ]);

        $this->mergeFillable([
            "mesin",
            "kapasitas penumpang",
            "tipe",
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
