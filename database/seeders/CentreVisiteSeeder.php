<?php

namespace Database\Seeders;

use App\Models\CentreVisite;
use Illuminate\Database\Seeder;

class CentreVisiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CentreVisite::create([
            'nom' => 'Dekra',
            'adresse' => 'Marrakech',
            'company_id' => 1,
            'user_id' => 1,
        ]);

        CentreVisite::create([
            'nom' => 'Dekra',
            'adresse' => 'Marrakech',
            'company_id' => 2,
            'user_id' => 2,
        ]);
    }
}
