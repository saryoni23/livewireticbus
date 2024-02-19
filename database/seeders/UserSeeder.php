<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole      = Role::where('name','admin')->first();
        $karyawanRole   = Role::where('name','karyawan')->first();
        $userRole       = Role::where('name','user')->first();


        $admin = User::create([
            'name'      => 'admin',
            'is_admin'  => 1,
            'email'     => 'admin@admin.com',
            'email_verified_at' => now(),
            'password'  => Hash::make('admin123'),
            'remember_token'=> Str::random(10)
        ]);
        $karyawan = User::create([
            'name'      => 'karyawan',
            'is_admin'  => 1,
            'email'     => 'karyawan@karyawan.com',
            'email_verified_at' => now(),
            'password'  => Hash::make('admin123'),
            'remember_token'=> Str::random(10)
        ]);
        $user = User::create([
            'name'      => 'user',
            'is_admin'  => 1,
            'email'     => 'user@user.com',
            'email_verified_at' => now(),
            'password'  => Hash::make('admin123'),
            'remember_token'=> Str::random(10)
        ]);

        $admin->roles()->attach($adminRole);
        $karyawan->roles()->attach($karyawanRole);
        $user->roles()->attach($userRole);
    }
}
