<?php

namespace App\Models;

use App\Models\Kendaraan;

// class MotorProperties 
// {
//     "mesin";
//     "tipe suspensi";
//     "tipe transmisi";
// }

class Motor extends Kendaraan
{
    function __construct(array $attributes = array())
    {
        array_push($this->fillable, "motor");

        parent::__construct($attributes);
    }
}
