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
                'logo' => 'logos/default.png',
                'vat_number' => $faker->numerify('###########'), // 11 cifre
            ]);
        }
    }
}
