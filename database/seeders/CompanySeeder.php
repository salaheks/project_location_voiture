<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => "Yassir car",
            'capital' => '50000',
            'tp' => "85412123",
            'rc' => "32546987",
            'idf' => "69542312",
            'ice' => "963214521",
            'address' => "hay lahrach , massira 1",
            'rib' => "95426871236954782123",
            'swift' => "524875123",
            'url' => "https://www.yassircar.com/",
            'email' => "info@yassircar.com",
            'phone' => "+212 662 15 10 10",
            'directorphone' => "+212 655 10 44 10",
        ]);

        Company::create([
            'name' => "Sami Car",
            'capital' => '90000',
            'tp' => "892452547",
            'rc' => "359745233",
            'idf' => "6987513246",
            'ice' => "36548797512",
            'address' => "3, Angle Boulevard Abdel Karim Al Khattabi et N, Marrakech 24000",
            'rib' => "6854795123654875",
            'swift' => "3695478125648",
            'url' => "https://www.samicar.com/",
            'email' => "contact@samicar.com",
            'phone' => "+212.711.106.608",
            'directorphone' => "+212.661.154.849",
        ]);
    }
}
