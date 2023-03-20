<?php

namespace App\Models;

use App\Models\Kendaraan;

// class MobilProperties 
// {
//     "mesin",
//     "kapasitas penumpang",
//     "tipe",
// }

class Mobil extends Kendaraan
{
    function __construct(array $attributes = array())
    {
        array_push($this->fillable, "mobil");

        parent::__construct($attributes);
    }
}
