<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ParameterSuhu;
use App\Models\Suhu;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Seeder untuk parameter_suhu
        ParameterSuhu::create([
            'max_suhu' => 30,
            'min_suhu' => 20,
        ]);


        // Seeder untuk suhu
        Suhu::create([
            'suhu' => 25.0,
            'tanggal' => now()->toDateString(),
            'waktu' => now()->toTimeString(),
        ]);

    }
}
