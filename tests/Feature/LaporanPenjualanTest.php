<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Motor;
use App\Models\Mobil;
use Illuminate\Support\Facades\Artisan;

class LaporanPenjualanTest extends TestCase
{
    public function testLaporanPenjualanTest()
    {
        Artisan::call('db:seed');

        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $this->json('GET', 'api/laporan', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "total",
                "total revenue",
                "detil" => [
                    "*" => [
                        "count",
                        "revenue",
                        "penjualan",
                        "date start",
                        "date end",
                    ]
                ],
            ]);
    }
}
