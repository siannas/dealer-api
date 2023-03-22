<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\RepositoryInterfaces\KendaraanRepository as KendaraanRepositoryInterface;

class GetPenjualanKendaraan
{
    private KendaraanRepositoryInterface $kendaraanRepo;
    
    public function __construct(KendaraanRepositoryInterface $kendaraanRepo)
    {
        $this->kendaraanRepo = $kendaraanRepo;
    }

    public function index(Request $request) : JsonResponse
    {
        $rawdata = $this->kendaraanRepo->getPenjualanKendaraan();

        $data = ["total" => 0, "total revenue" => 0];

        foreach ($rawdata as $item) {
            $key = match ($item->_id) {
                1 => 'motor',
                2 => 'mobil',
                default => null,
            };

            if($key == null) continue;

            $data[$key] = $item;
            $data["total"] += $item->count;
            $data["total revenue"] += $item->revenue;
        }

        return response()->json(
            $data,
            200
        );
    }
}