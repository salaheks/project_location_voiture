<?php

namespace Database\Seeders;

use App\Models\Assureur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssureurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Assureur::create([
            'nom' => 'RMA',
            'adresse' => 'Marrakech',
            'company_id' => 1,
            'user_id' => 1,
        ]);

        Assureur::create([
            'nom' => 'Sanlam',
            'adresse' => 'Marrakech',
            'company_id' => 1,
            'user_id' => 1,
        ]);

        Assureur::create([
            'nom' => 'RMA',
            'adresse' => 'Marrakech',
            'company_id' => 2,
            'user_id' => 2,
        ]);
    }
}
