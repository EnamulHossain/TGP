<?php

namespace Database\Seeders;

use App\Models\StoreSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSettingSeeder extends Seeder
{
    public function run(\Faker\Generator $faker)
    {
        $storeSetting = [
            'store_name' => 'The Grant Portal',
            'store_url' => 'https://303o94126952633.s4shops.com',
            'app_name' => 'The Grant Portal App',
            'token' => '73474daa04a8c533e46f70fac3ae4be7',
            'private_key' => '93933b41e7bf3ed410e77cfc972f67c4',
            'public_key' => '8387e45cc0b37ff641790e752f574dfc',
            'host' => 'https://apirest.3dcart.com',
            'is_active' => true,
        ];

        DB::table('store_settings')->truncate();
        StoreSetting::create($storeSetting);
    }
}
