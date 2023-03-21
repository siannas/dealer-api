<?php

namespace App\RepositoryInterfaces;

interface KendaraanRepository 
{
    public function getAllKendaraan();
    public function getKendaraanById($kendaraanId);
    public function getAllMotor();
    public function getAllMobil();
}