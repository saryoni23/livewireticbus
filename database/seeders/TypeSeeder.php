<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create(['car_id' => 1, 'name' => 'BRV']);
        Type::create(['car_id' => 1, 'name' => 'CRV']);
        Type::create(['car_id' => 1, 'name' => 'DRV']);
        Type::create(['car_id' => 1, 'name' => 'Mobilio']);
        Type::create(['car_id' => 1, 'name' => 'Brio']);
        Type::create(['car_id' => 2, 'name' => 'DRV']);
        Type::create(['car_id' => 2, 'name' => 'Mobilio']);
        Type::create(['car_id' => 2, 'name' => 'Brio']);
        Type::create(['car_id' => 3, 'name' => 'Brio']);
        Type::create(['car_id' => 3, 'name' => 'DRV']);
        Type::create(['car_id' => 3, 'name' => 'Mobilio']);
        Type::create(['car_id' => 3, 'name' => 'Brio']);
    }
}
