<?php

namespace Database\Seeders;

use App\Models\Vignettes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VignettesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vignettes::create([
            'mode_reglement' => 'Cheque',
            'prix' => 200,
            'date_paiement' => '2024-01-12',
            'voiture_id' => 1,
            'user_id' => 1,
        ]);

        Vignettes::create([
            'mode_reglement' => 'Cheque',
            'prix' => 300,
            'date_paiement' => '2023-10-10',
            'voiture_id' => 3,
            'user_id' => 2,
        ]);
    }
}
