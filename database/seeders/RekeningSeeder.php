<?php

namespace Database\Seeders;

use App\Models\Rekening;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        foreach(range(1, 3) as $index) {
            Rekening::create([
                'no' => $faker->creditCardNumber(),
                'name' => $faker->name(),
                'bank' => $faker->company(),
            ]);
        }
    }
}
