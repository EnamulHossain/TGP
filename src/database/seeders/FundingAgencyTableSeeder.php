<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FundingAgencyTableSeeder extends BasicSeeder
{
    public function run()
    {
        $this->importBasic('funding_agencies.csv', \App\Models\FundingAgency::class);
    }
}
