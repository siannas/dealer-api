<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Kendaraan;
use App\Models\Motor;

class coba extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coba:coba';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Coba description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = new \DateTime();
        // $kendaraan = Kendaraan::create([
        //     "tahun keluaran" => 2022, 
        //     "warna" => "kuning", 
        //     "harga" => 9924012,
        //     "terjual" => $now->format('c'),
        //     "motor" => [
        //         "mesin" => "DOHC",
        //         "tipe suspensi" => "Double Wishbone",
        //         "tipe transmisi" => "Sliding Mesh",
        //     ]
        // ]);

        // $motor = Motor::create([
        //     "tahun keluaran" => 2022, 
        //     "warna" => "kuning", 
        //     "harga" => 9924012,
        //     "terjual" => $now->format('c'),
        //     "motor" => [
        //         "mesin" => "DOHC",
        //         "tipe suspensi" => "Double Wishbone",
        //         "tipe transmisi" => "Sliding Mesh",
        //     ]
        // ]);

        $motor = Motor::first();
        echo $motor->motor;
    }
}