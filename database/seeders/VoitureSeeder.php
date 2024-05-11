<?php

namespace Database\Seeders;

use App\Models\Voiture;
use Illuminate\Database\Seeder;

class VoitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voiture::create([
            'immatriculation' => '26-a-6587',
            'nombre_porte' => '4',
            'couleur' => 'Gris',
            'categorie' => 'Compact',
            'type_id' => 1,
            'climatisation' => 1,
            'nombre_passager' => 6,
            'airbag' => 1,
            'credit' => 0,
            'company_id' => 1,
            'user_id' => 1,
        ]);

        Voiture::create([
            'immatriculation' => '26-a-101',
            'nombre_porte' => '4',
            'couleur' => 'Noir',
            'categorie' => 'Mini',
            'type_id' => 2,
            'climatisation' => 1,
            'nombre_passager' => 6,
            'airbag' => 1,
            'credit' => 0,
            'company_id' => 1,
            'user_id' => 1,
        ]);

        Voiture::create([
            'immatriculation' => '33-a-3035',
            'nombre_porte' => '4',
            'couleur' => 'Noir',
            'categorie' => 'Mini',
            'type_id' => 3,
            'climatisation' => 1,
            'nombre_passager' => 6,
            'airbag' => 1,
            'credit' => 0,
            'company_id' => 2,
            'user_id' => 2,
        ]);
    }
}
