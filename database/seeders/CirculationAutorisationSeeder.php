<?php

namespace Database\Seeders;

use App\Models\CirculationAutorisation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CirculationAutorisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CirculationAutorisation::create([
            'date_debut' => '2024-01-01',
            'date_fin' => '2025-01-01',
            'voiture_id' => 1,
            'user_id' => 1,
        ]);

        CirculationAutorisation::create([
            'date_debut' => '2023-01-01',
            'date_fin' => '2024-01-01',
            'voiture_id' => 2,
            'user_id' => 1,
        ]);

        CirculationAutorisation::create([
            'date_debut' => '2023-01-01',
            'date_fin' => '2024-01-01',
            'voiture_id' => 3,
            'user_id' => 2,
        ]);
    }
}
