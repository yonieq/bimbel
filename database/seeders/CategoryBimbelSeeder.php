<?php

namespace Database\Seeders;

use App\Models\CategoryBimbel;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryBimbelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        foreach(range(1, 10) as $index) {
            CategoryBimbel::create([
                'name' => $faker->name(),
                'description' => $faker->sentence,
                'class' => $faker->company(),
                'price' => $faker->numberBetween(10000, 9999999),
            ]);
        }
    }
}
