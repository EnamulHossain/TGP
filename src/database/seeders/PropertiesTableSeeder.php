<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends BasicSeeder
{
    public function run()
    {
        $this->importBasic('properties.csv', \App\Models\Properties::class);
    }
}
