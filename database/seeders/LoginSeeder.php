<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'K8',
                'email' => 'k8casinomkt@gmail.com',
                'k8_username' => 'k8admin',
                'password' => Hash::make('k8admin123'),
            ],
            [
                'name' => 'Ronin',
                'email' => 'ronin@mail-k8.io',
                'k8_username' => 'ronink8',
                'password' => Hash::make('k8admin123'),
            ],
            [
                'name' => 'Wawa',
                'email' => 'wawach@gmail.com',
                'k8_username' => 'wawach',
                'password' => Hash::make('k8admin123'),
            ]
        ]);
    }
}
