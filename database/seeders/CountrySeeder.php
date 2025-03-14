<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include __DIR__ . "../../../Constants/Country.php";


        foreach ($Countries as $country) {
            Country::create([
                "country" => $country
            ]);
        }
    }
}
