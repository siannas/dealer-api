<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\RepositoryInterfaces\KendaraanRepository as KendaraanRepositoryInterface;

class GetLaporanPenjualanKendaraan
{
    private KendaraanRepositoryInterface $kendaraanRepo;
    
    public function __construct(KendaraanRepositoryInterface $kendaraanRepo)
    {
        $this->kendaraanRepo = $kendaraanRepo;
    }

    public function index(Request $request) : JsonResponse
    {
        $dateStart = $request->dateStart ?: now()->format('Y-m-d');
        $dateDiff = $request->dateDiff ?: 7;
        $tipeKendaraan = $request->tipeKendaraan ?: [1, 2];
        $date = new \DateTime($dateStart);

        $rawdata = $this->kendaraanRepo->getStatistikPenjualan( $dateStart , $dateDiff, $tipeKendaraan);

        $data = ["total" => 0, "total revenue" => 0, "detil" => []];

        foreach ($rawdata as $item) {
            $item['date start'] = $date->format('Y-m-d');
            $date->modify("+".($dateDiff-1)." day");
            $item['date end'] = $date->format('Y-m-d');
            $date->modify("+1 day");
            
            array_push($data["detil"], $item);
            $data["total"] += $item->count;
            $data["total revenue"] += $item->revenue;
        }

        return response()->json(
            $data,
            200
        );
    }
}