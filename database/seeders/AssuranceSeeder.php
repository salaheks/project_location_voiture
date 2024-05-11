<?php

namespace Database\Seeders;

use App\Models\Assurance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Assurance::create([
            'date_debut' => '2023-05-02',
            'date_fin' => '2024-05-02',
            'date_paiement' => '2023-05-02',
            'type' => 'Assurance au tiers',
            'assureur_id' => 1,
            'mode_reglement' => 'Espece',
            'prix_assurance' => 1500,
            'voiture_id' => 1,
            'user_id' => 1
        ]);

        Assurance::create([
            'date_debut' => '2024-05-02',
            'date_fin' => '2025-05-02',
            'date_paiement' => '2024-05-02',
            'type' => 'Assurance au tiers',
            'assureur_id' => 2,
            'mode_reglement' => 'Espece',
            'prix_assurance' => 1500,
            'voiture_id' => 2,
            'user_id' => 1
        ]);

        Assurance::create([
            'date_debut' => '2023-03-03',
            'date_fin' => '2024-03-03',
            'date_paiement' => '2023-03-03',
            'type' => 'Assurance au tiers',
            'assureur_id' => 1,
            'mode_reglement' => 'Espece',
            'prix_assurance' => 1600,
            'voiture_id' => 3,
            'user_id' => 2
        ]);
    }
}
