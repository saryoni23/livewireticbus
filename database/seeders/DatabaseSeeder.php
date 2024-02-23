<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Car;
use App\Models\Kategori;
use App\Models\Type;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // RoleSeeder::class,
            // UserSeeder::class,
            // KategoriSeeder::class,
            CarSeeder::class,
            TypeSeeder::class,
        ]);
        // \App\Models\Role::factory()->hasUsers(10)->create();
    }
}
