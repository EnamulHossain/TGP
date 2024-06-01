<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InterestsTableSeeder extends BasicSeeder
{
    public function run()
    {
        $this->importBasic('interests.csv', \App\Models\Interest::class);
    }
}