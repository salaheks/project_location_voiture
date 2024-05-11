<?php

namespace Database\Seeders;

use App\Models\Convoyage;
use Illuminate\Database\Seeder;

class ConvoyageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Convoyage::create([
            'ville' => 'Marrakech',
            'prix_mad_ville_livraison' => 300,
            'prix_mad_ville_retour' => 300,
            'prix_euro_ville_livraison' => 30,
            'prix_euro_ville_retour' => 30,
            'company_id' => 1,
            'user_id' => 1,
        ]);

        Convoyage::create([
            'ville' => 'Rabat',
            'prix_mad_ville_livraison' => 500,
            'prix_mad_ville_retour' => 500,
            'prix_euro_ville_livraison' => 50,
            'prix_euro_ville_retour' => 50,
            'company_id' => 1,
            'user_id' => 1,
        ]);

        Convoyage::create([
            'ville' => 'Marrakech',
            'prix_mad_ville_livraison' => 200,
            'prix_mad_ville_retour' => 200,
            'prix_euro_ville_livraison' => 20,
            'prix_euro_ville_retour' => 20,
            'company_id' => 2,
            'user_id' => 2,
        ]);
    }
}
