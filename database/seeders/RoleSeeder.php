<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'User Administrator',
            'guard_name' => 'web',
            'description' => 'A person responsible for running a business, organization, etc',
            'created_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Moderator',
            'guard_name' => 'web',
            'description' => 'A person who moderates an Internet forum or online discussion',
            'created_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Theme Manager',
            'guard_name' => 'web',
            'description' => 'A person who controls the activities, business dealings, and other aspects of the career of an entertainer, athlete, group of musicians, etc',
            'created_at' => Carbon::now()
        ]);
    }
}
