<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('platforms')->insert([
            [
                'name' => 'Facebook',
                'slug' => 'facebook',
            ],
            [
                'name' => 'Instagram',
                'slug' => 'instagram',
            ],
            [
                'name' => 'X',
                'slug' => 'x',
            ],
            [
                'name' => 'Youtube',
                'slug' => 'youtube'
            ],
            [
                'name' => 'Telegram',
                'slug' => 'telegram',
            ],
            [
                'name' => 'Discord',
                'slug' => 'discord'
            ],
            [
                'name' => 'Line',
                'slug' => 'line',
            ],
            [
                'name' => 'K8',
                'slug' => 'k8'
            ]
        ]);
    }
}
