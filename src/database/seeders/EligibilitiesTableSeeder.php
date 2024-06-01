<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EligibilitiesTableSeeder extends BasicSeeder
{
    public function run()
    {
        $this->importBasic('eligibilities.csv', \App\Models\Eligibilty::class);
    }
}
