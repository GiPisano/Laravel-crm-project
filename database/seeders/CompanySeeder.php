<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            Company::create([
                'name' => $faker->company,
                'logo' => $faker->imageUrl(200, 200, 'business'),
                'vat_number' => $faker->numerify('###########'), // 11 cifre
            ]);
        }
    }
}
