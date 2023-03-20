<?php

namespace App\RepositoryInterfaces;

interface KendaraanRepositoryInterface 
{
    public function getAllKendaraan();
    public function getKendaraanById($kendaraanId);
    public function getAllMotor();
    public function getAllMobil();
}