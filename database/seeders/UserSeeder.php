<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "yassir",
            'email' => "admin@yassir.com",
            'email_verified_at' => now(),
            'password' => bcrypt('adminS'),
            'company_id' => 1,
        ]);

        User::create([
            'name' => "Sami",
            'email' => "admin@sami.com",
            'email_verified_at' => now(),
            'password' => bcrypt('adminS'),
            'company_id' => 2,
        ]);
    }
}
