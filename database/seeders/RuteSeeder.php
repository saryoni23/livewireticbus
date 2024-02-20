<?php

namespace Database\Seeders;

use App\Models\Rute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rute::create([  'kota_asal'     => 'Sipahutar',
                        'kota_tujuan'   => 'Medan',
                        'jam_berangkat' => '12.00',
                        'is_active'     => '1',
                    ]);
        Rute::create([  'kota_asal'     => 'Medan',
                        'kota_tujuan'   => 'Sipahutar',
                        'jam_berangkat' => '12.00',
                        'is_active'     => '1',
                    ]);
    }
}
