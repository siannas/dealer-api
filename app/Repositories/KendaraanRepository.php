<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\RepositoryInterfaces\KendaraanRepository as KendaraanRepositoryInterface;
use App\Models\Kendaraan;
use App\Models\Motor;
use App\Models\Mobil;
use Jenssegers\Mongodb\Collection as JenssegersCollection;

class KendaraanRepository implements KendaraanRepositoryInterface
{
    private string $dateStart;
    private int $dateDiff;
    private array $tipeKendaraan;

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

    public function getStok() : Collection
    {
        return Kendaraan::raw(function(JenssegersCollection $collection) {
            return $collection->aggregate([
                [
                    '$match'=> ['terjual' => null]
                ],
                [
                    '$group' => [
                        '_id' => '$tipe kendaraan', 
                        'count' => ['$sum' => 1],
                        'data' => ['$push' => '$_id']
                    ]
                ]
            ]);
        });
    }

    public function getPenjualanKendaraan() : Collection
    {
        return Kendaraan::raw(function(JenssegersCollection $collection) {
            return $collection->aggregate([
                [
                    '$match'=> ['terjual' => ['$ne' => null] ] 
                ],
                [
                    '$group' => [
                        '_id' => '$tipe kendaraan', 
                        'count' => ['$sum' => 1],
                        'revenue' => ['$sum' => '$harga'],
                        'penjualan' => ['$push' => '$_id']
                    ]
                ]
            ]);
        });
    }

    private function dataHelper() : array
    {
        return [
            'dateStart' => strtotime($this->dateStart) * 1000,
            'dateDiff' => $this->dateDiff*24*3600*1000,
            'tipeKendaraan' => $this->tipeKendaraan,
        ];
    }

    public function getStatistikPenjualan(string $dateStart, int $dateDiff, array $tipeKendaraan) : Collection
    {
        $this->dateStart = $dateStart;
        $this->dateDiff = $dateDiff;
        $this->tipeKendaraan = $tipeKendaraan;

        return Kendaraan::raw(function(JenssegersCollection $collection) {

            $data = KendaraanRepository::dataHelper();

            return $collection->aggregate([
                [
                    '$match'=> [
                        'terjual' => ['$ne' => null],  
                        'tipe kendaraan' => ['$in'=> $data['tipeKendaraan']]
                        ] 
                ],
                [
                    '$addFields'=> [ 
                        'day' => ['$divide' => [[ '$subtract' => [[ '$toLong' => '$terjual'] , $data['dateStart']]]  ,  $data['dateDiff'] ]]
                    ] 
                ],
                [
                    '$match'=> ['day' => ['$gte' => 0] ] 
                ],
                [
                    '$group' => [
                        '_id' => ['$floor' => '$day'], 
                        'count' => ['$sum' => 1],
                        'revenue' => ['$sum' => '$harga'],
                        'penjualan' => ['$push' => '$_id']
                    ]
                ],
                [
                    '$sort'=> ['_id' => 1 ] 
                ],
            ]);
        });
    }
}