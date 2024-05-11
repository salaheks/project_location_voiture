<?php

namespace Database\Seeders;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'nom' => 'Omar Semlali',
            'date_naissance' => Carbon::create('2000', '03', '03'),
            'adresse' => 'Massira 1 , Marrakech',
            'permis' => 'ABC123456',
            'date_delivration_permis' => Carbon::now()->subYears(5),
            'cin' => '957412',
            'num_passeport' => '54257841',
            'date_delivration_passeport' => Carbon::now()->subYears(10),
            'telephone' => '0657481296',
            'email' => 'omar.semlali@yassir.com',
            'isCompany' => false,
            'ice' => null,
            'company_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Client::create([
            'nom' => 'Yahya Tarmidi',
            'date_naissance' => Carbon::create('2002', '05', '05'),
            'adresse' => 'Massira 3 , Marrakech',
            'permis' => '352486',
            'date_delivration_permis' => Carbon::now()->subYears(5),
            'cin' => 'EE68745',
            'num_passeport' => '3647812',
            'date_delivration_passeport' => Carbon::now()->subYears(10),
            'telephone' => '0654123697',
            'email' => 'yahya.tarmidi@yassir.com',
            'isCompany' => false,
            'ice' => null,
            'company_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Client::create([
            'nom' => 'Ali Mohamed',
            'date_naissance' => Carbon::create('1997', '04', '04'),
            'adresse' => 'Doha, Marrakech',
            'permis' => '564511',
            'date_delivration_permis' => Carbon::now()->subYears(5),
            'cin' => 'EE759436',
            'num_passeport' => '354412',
            'date_delivration_passeport' => Carbon::now()->subYears(10),
            'telephone' => '0758491628',
            'email' => 'ali.mohamed@sami.com',
            'isCompany' => false,
            'ice' => null,
            'company_id' => 2,
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
