<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_admin = DB::table("users")->where("name", "=", "Jane UserAdmin")->first();
        $user_moderator  = DB::table("users")->where("name", "=","Bob Moderator")->first();
        $user_manager  = DB::table("users")->where("name", "=","Susan ThemeAdmin")->first();

        $role_admin = DB::table("roles")->where("name", "=","User Administrator")->first();
        $role_moderator  = DB::table("roles")->where("name", "=","Moderator")->first();
        $role_manager  = DB::table("roles")->where("name", "=","Theme Manager")->first();

        DB::table('role_user')->insert([
            'user_id' => $user_admin->id,
            'role_id' => $role_admin->id
        ]);

        DB::table('role_user')->insert([
            'user_id' => $user_moderator->id,
            'role_id' => $role_moderator->id
        ]);

        DB::table('role_user')->insert([
            'user_id' => $user_manager->id,
            'role_id' => $role_manager->id
        ]);
    }
}
