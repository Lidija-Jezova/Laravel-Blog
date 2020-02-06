<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('users_roles')->truncate();
        DB::table('roles')->truncate();

        $regural_user = new Role();
        $regural_user->name = 'regular_user';
        $regural_user->description = 'Regular User.';
        $regural_user->save();

        $moderator = new Role();
        $moderator->name = 'moderator';
        $moderator->description = 'Moderator.';
        $moderator->save();

        $admin = new Role();
        $admin->name = 'administrator';
        $admin->description = 'Administrator.';
        $admin->save();
    }
}
