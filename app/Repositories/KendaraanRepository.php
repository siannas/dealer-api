<?php

namespace App\Repositories;

use App\RepositoryInterfaces\KendaraanRepository as KendaraanRepositoryInterface;
use App\Models\Kendaraan;
use App\Models\Motor;
use App\Models\Mobil;

class KendaraanRepository implements KendaraanRepositoryInterface
{
    public function getAllKendaraan()
    {
        return Kendaraan::all();
    }

    public function getKendaraanById($kendaraanId)
    {
        return Kendaraan::findOrFail($kendaraanId);
    }

    public function getAllMotor()
    {
        return Motor::all();
    }

    public function getAllMobil()
    {
        return Mobil::all();
    }

    public function getStok()
    {
        return Kendaraan::groupBy('tipe kendaraan')->get();
    }
}