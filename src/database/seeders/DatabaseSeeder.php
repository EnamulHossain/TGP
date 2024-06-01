<?php

namespace Database\Seeders;

use App\Models\PublicChat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(NavigationsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(TemplatesTableSeeder::class);
        $this->call(LayoutsTableSeeder::class);
        $this->call(PropertiesTableSeeder::class);
        $this->call(CountryStatesTableSeeder::class);
        $this->call(InterestsTableSeeder::class);
        $this->call(EligibilitiesTableSeeder::class);
        $this->call(FundingAgencyTableSeeder::class);
        $this->call(PricePlanTableSeeder::class);
        $this->call(StoreSettingSeeder::class);
        $this->call(SnippetTableSeeder::class);
    }
}
