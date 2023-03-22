<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Kendaraan;
use App\Models\Motor;
use App\Models\Mobil;

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
        //     // "terjual" => null, //$now->format('c'),
        //     "mesin" => "DOHC",
        //     "tipe suspensi" => "Double Wishbone",
        //     "tipe transmisi" => "Sliding Mesh",
        // ]);

        
        // $mobil = Mobil::create([
        //     "tahun keluaran" => 2022, 
        //     "warna" => "kuning", 
        //     "harga" => 9924012,
        //     // "terjual" => null, //$now->format('c'),
        //     "mesin" => "DOHC",
        //     "kapasitas penumpang" => 4,
        //     "tipe" => "SUV",
        // ]);

        // $motor = new Mobil();
        // $motor["tahun keluaran"] = 1999;
        // $motor["warna 2"] = "hitam";
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

        // $motor = Motor::first();
        // var_dump($motor);
        // $motor->save();
        // echo $mobil;

        $kendaraan = Kendaraan::first();
        echo $kendaraan->terjual;
        // echo get_class( $kendaraan);
    }
}
