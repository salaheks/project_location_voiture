<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            'marque' => 'Nissan',
            'model' => '370Z',
            'transmission' => 'automatique',
            'carburant' => 'diesel',
            'prix' => '400',
            'company_id' => 1,
        ]);

        Type::create([
            'marque' => 'Dacia',
            'model' => 'Duster',
            'transmission' => 'automatique',
            'carburant' => 'diesel',
            'prix' => '300',
            'company_id' => 1,
        ]);

        Type::create([
            'marque' => 'Renault',
            'model' => 'Captur',
            'transmission' => 'automatique',
            'carburant' => 'essence',
            'prix' => '200',
            'company_id' => 2,
        ]);
    }
}
