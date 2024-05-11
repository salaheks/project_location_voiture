<?php

namespace Database\Seeders;

use App\Models\Panne;
use Illuminate\Database\Seeder;

class PanneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Panne::create([
            'type' => 'Pneu',
            'date_panne' => '2024-01-12',
            'date_paiment' => '2024-01-12',
            'date_debut' => '2024-01-12',
            'date_fin' => '2024-01-24',
            'garage_responsable' => 'idGarage',
            'mode_reglement' => 'Espece',
            'prix_total' => 230,
            'voiture_id' => 2,
            'user_id' => 1,
            'client_id' => 2,
        ]);

        Panne::create([
            'type' => 'Pneu',
            'date_panne' => '2024-01-12',
            'date_paiment' => '2024-01-12',
            'date_debut' => '2024-01-12',
            'date_fin' => '2024-01-24',
            'garage_responsable' => 'idGarage',
            'mode_reglement' => 'Espece',
            'prix_total' => 230,
            'voiture_id' => 3,
            'user_id' => 2,
            'client_id' => 2,
        ]);
    }
}
