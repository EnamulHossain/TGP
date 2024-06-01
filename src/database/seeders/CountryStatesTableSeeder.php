<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountryStatesTableSeeder extends BasicSeeder
{
    public function run()
    {
        $this->importBasic('continents.csv', \App\Models\Continent::class);
        $this->importBasic('country.csv', \App\Models\Country::class);
        $this->importBasic('country_states.csv', \App\Models\Province::class);
    }
}
