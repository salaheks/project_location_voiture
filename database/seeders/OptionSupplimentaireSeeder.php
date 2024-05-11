<?php

namespace Database\Seeders;

use App\Models\OptionSupplimentaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSupplimentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OptionSupplimentaire::create([
            'nom' => 'GPS',
            'type_paiement' => 'par jour',
            'prix' => '50',
            'quantite' => '6',
            'company_id' => 1,
        ]);

        OptionSupplimentaire::create([
            'nom' => 'siege bebe',
            'type_paiement' => 'par reservation',
            'prix' => '80',
            'quantite' => '4',
            'company_id' => 1,
        ]);

        OptionSupplimentaire::create([
            'nom' => 'GPS',
            'type_paiement' => 'par jour',
            'prix' => '50',
            'quantite' => '8',
            'company_id' => 2,
        ]);
    }
}
