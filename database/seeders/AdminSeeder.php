<?php

namespace Database\Seeders; // Deve essere corretto!

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $password = Str::random(12);

        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make($password),
                'role' => 'admin',
                'is_admin' => true,
            ]
        );

        $this->command->info("Admin creato!");
        $this->command->warn("Email: admin@example.com");
        $this->command->warn("Password: $password");
    }
}
