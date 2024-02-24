<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole      = 'admin';
        $karyawanRole   ='karyawan';
        $userRole       ='user';
        $phoneNumber = '08' . mt_rand(100000000, 999999999);

        $admin = User::create([
            'name'      => 'admin',
            'role'      =>  $adminRole,
            'no_hp'     => $phoneNumber,
            'email'     => 'admin@admin.com',
            'email_verified_at' => now(),
            'password'  => Hash::make('admin123'),
            'remember_token'=> Str::random(10),
            'tgllahir'  =>'1997-01-12',


            

        ]);
        $karyawan = User::create([
            'name'      => 'karyawan',
            'role'      =>$karyawanRole,
            'email'     => 'karyawan@karyawan.com',
            'email_verified_at' => now(),
            'password'  => Hash::make('admin123'),
            'remember_token'=> Str::random(10),
            'no_hp'     => $phoneNumber,
            'tgllahir'  =>'1997-01-12',



        ]);
        $user = User::create([
            'name'      => 'user',
            'role'      =>$userRole,
            'email'     => 'user@user.com',
            'email_verified_at' => now(),
            'password'  => Hash::make('admin123'),
            'remember_token'=> Str::random(10),
            'tgllahir'  =>'1997-01-12',
            'no_hp'     => $phoneNumber,
        ]);

    }
}
