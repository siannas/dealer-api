<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Kendaraan;
use App\Enums\TipeKendaraan;

class Motor extends Kendaraan
{
    use HasFactory;

    function __construct(array $attributes = array())
    {
        $attributes['tipe kendaraan'] = TipeKendaraan::MOTOR;

        $this->mergeFillable([
            'mesin',
            'tipe suspensi',
            'tipe transmisi',
            "tipe kendaraan",
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
