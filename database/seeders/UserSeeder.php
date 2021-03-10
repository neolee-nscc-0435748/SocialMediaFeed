<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jane UserAdmin',
            'email' => 'jane@example.com',
            'password' => bcrypt('Password!123'),
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Bob Moderator',
            'email' => 'bob@example.com',
            'password' => bcrypt('Password!123'),
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Susan ThemeAdmin',
            'email' => 'susan@example.com',
            'password' => bcrypt('Password!123'),
            'created_at' => Carbon::now()
        ]);
    }
}
