<?php

namespace App\Models;

use App\Models\Kendaraan;
use App\Enums\TipeKendaraan;

class Motor extends Kendaraan
{
    function __construct(array $attributes = array())
    {
        $this->attributes = array_merge($attributes, [
            'tipe kendaraan' => TipeKendaraan::MOTOR,
        ]);

        $this->mergeFillable([
            'mesin',
            'tipe suspensi',
            'tipe transmisi',
        ]);

        $this->mergeCasts([
            'mesin' => 'string',
            'tipe suspensi' => 'string',
            'tipe transmisi' => 'string',
            'tipe kendaraan' => 'int',
        ]);

        parent::__construct($attributes);
    }
}
