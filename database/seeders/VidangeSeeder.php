<?php

namespace Database\Seeders;

use App\Models\Vidange;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VidangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vidange::create([
            'mode_reglement' => 'Cheque',
            'km_debut' => 1500,
            'type_huile' => 'Huile minérale',
            'prix' => 300,
            'date_changement' => '2023-10-10',
            'filtre_huile' => 0,
            'filtre_air' => 1,
            'filtre_gazoil' => 0,
            'km_vidange' => 1000,
            'voiture_id' => 2,
            'user_id' => 1,
        ]);

        Vidange::create([
            'mode_reglement' => 'Cheque',
            'km_debut' => 3100,
            'type_huile' => 'Huile minérale',
            'prix' => 500,
            'date_changement' => '2024-01-01',
            'filtre_huile' => 1,
            'filtre_air' => 1,
            'filtre_gazoil' => 1,
            'km_vidange' => 1500,
            'voiture_id' => 3,
            'user_id' => 2,
        ]);
    }
}
