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
            $companyName = $faker->company;
            Company::create([
                'name' => $faker->company,
                'logo' => "https://api.dicebear.com/7.x/identicon/svg?seed=" . urlencode($companyName),
                'vat_number' => $faker->numerify('###########'), // 11 cifre
            ]);
        }
    }
}
