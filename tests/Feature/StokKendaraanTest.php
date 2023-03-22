<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Motor;
use App\Models\Mobil;
use Illuminate\Support\Facades\DB;

class StokKendaraanTest extends TestCase
{
    public function testSuccessfulGetStokKendaraan()
    {
        Motor::factory()->count(7)->create([
            'terjual' => null
        ]);

        Mobil::factory()->count(3)->create([
            'terjual' => null
        ]);

        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $this->json('GET', 'api/stok', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "total",
                "motor" => [
                    "count",
                    "data"
                ],
                "mobil" => [
                    "count",
                    "data"
                ],
            ]);
    }
}
