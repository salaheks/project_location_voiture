<?php

namespace Database\Seeders;

use App\Models\visiteTechnique;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisiteTechniqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        visiteTechnique::create([
            'montant' => 250,
            'date_controle' => '2024-02-02',
            'date_prochaine_visite' => '2025-02-02',
            'mode_reglement' => 'Espece',
            'voiture_id' => 1,
            'centre_visite_id' => 1,
        ]);

        visiteTechnique::create([
            'montant' => 300,
            'date_controle' => '2023-03-03',
            'date_prochaine_visite' => '2024-03-03',
            'mode_reglement' => 'Virement',
            'voiture_id' => 2,
            'centre_visite_id' => 1,
        ]);

        visiteTechnique::create([
            'montant' => 200,
            'date_controle' => '2024-01-12',
            'date_prochaine_visite' => '2025-01-12',
            'mode_reglement' => 'Cheque',
            'voiture_id' => 3,
            'centre_visite_id' => 1,
        ]);
    }
}
