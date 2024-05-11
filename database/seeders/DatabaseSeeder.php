<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Assureur;
use App\Models\CirculationAutorisation;
use App\Models\DistributionChain;
use App\Models\Vignettes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CompanySeeder::class,
            UserSeeder::class,
            ClientSeeder::class,
            TypeSeeder::class,
            VoitureSeeder::class,
            CirculationAutorisationSeeder::class,
            OptionSupplimentaireSeeder::class,
            ConvoyageSeeder::class,
            CentreVisiteSeeder::class,
            VisiteTechniqueSeeder::class,
            AssureurSeeder::class,
            AssuranceSeeder::class,
            VignettesSeeder::class,
            VidangeSeeder::class,
            PanneSeeder::class,
            DistributionChainSeeder::class,
        ]);
    }
}
