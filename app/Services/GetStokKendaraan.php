<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\RepositoryInterfaces\KendaraanRepository as KendaraanRepositoryInterface;

use Illuminate\Support\Facades\DB;

class GetStokKendaraan
{
    private KendaraanRepositoryInterface $kendaraanRepo;
    
    public function __construct(KendaraanRepositoryInterface $kendaraanRepo)
    {
        $this->kendaraanRepo = $kendaraanRepo;
    }

    public function index(Request $request) : JsonResponse
    {
        return response()->json(
            $this->kendaraanRepo->getStok(),
            Response::HTTP_CREATED
        );
    }
}