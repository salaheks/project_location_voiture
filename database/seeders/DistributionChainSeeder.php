<?php

namespace Database\Seeders;

use App\Models\DistributionChain;
use Illuminate\Database\Seeder;

class DistributionChainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DistributionChain::create([
            'mode_reglement' => 'Cheque',
            'prix' => 500,
            'date_changement' => '2023-07-08',
            'km_initial' => 3600,
            'km_changement' => 1200,
            'voiture_id' => 1,
            'user_id' => 1,
        ]);

        DistributionChain::create([
            'mode_reglement' => 'Cheque',
            'prix' => 600,
            'date_changement' => '2023-06-21',
            'km_initial' => 6800,
            'km_changement' => 3000,
            'voiture_id' => 3,
            'user_id' => 2,
        ]);
    }
}
