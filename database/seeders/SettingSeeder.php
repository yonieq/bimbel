<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Setting::create([
            'app_name' => 'Bimbel Kibong',
            'logo' => 'default.png',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,molestiae quas vel sint commodi',
            'banner' => 'default.png',
            'email' => 'example@gmail.com',
            'address' => 'Jalan Letnan Jenderal MT Haryono, Jakarta Selatan, Jakarta',
            'phone' => '08899085756',
        ]);
    }
}
