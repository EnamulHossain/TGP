<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run(\Faker\Generator $faker)
    {
        User::truncate();
        \DB::table('role_user')->truncate();

        //-------------------------------------------------
        // Deepayan
        //-------------------------------------------------
        $user = User::create([
            'firstname'         => 'Deepayan',
            'lastname'          => 'Mallick',
            'cellphone'         => '01711873363',
            'email'             => 'deepayan.cse@gmail.com',
            'gender'            => 'Male',
            'password'          => bcrypt('123456'),
            'email_verified_at' => now()
        ]);
        $this->addAllRolesToUser($user);       
    }

    /**
     * Add all the roles to the user
     * @param $user
     */
    private function addAllRolesToUser($user)
    {
        $roles = Role::all()->pluck('keyword', 'id')->values();

        $user->syncRoles($roles);
    }
}
