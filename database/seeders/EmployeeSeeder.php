<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Company;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $companies = Company::all();

        foreach ($companies as $company) {
            for ($i = 1; $i <= rand(3, 10); $i++) { // Ogni azienda avrà tra 3 e 10 impiegati
                Employee::create([
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'company_id' => $company->id,
                    'phone' => $faker->phoneNumber,
                    'email' => $faker->unique()->safeEmail,
                ]);
            }
        }
    }
}
