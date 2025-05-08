<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ToddLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'K8',
                'email' => 'todd@mail-k8.io',
                'k8_username' => 'k8admin',
                'password' => Hash::make('k8admin123'),
            ]
        ]);
    }
}
